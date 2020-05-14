
<?php
try{
    require("../code/initialisatie.inc.php");

    if(!isset($_POST['reset_pass']) && !isset($_GET['final_test']) ){

        throw new Exception("Illegal Access");
    }

    if(isset($_POST['reset_pass'])){
        //aanmaken van new validatie object
        $_valideren=new Validatie();
        $_valideren->validate($_POST,[

            "paswoord"=>[
                "hoofdletter"=>1,
                "nummers"=>1,
                "charMin"=>8
            ],
            "paswoord_her"=>[
                "vergelijk"=>"paswoord"
            ],

            "logon"=>[
                "ad"=>"@"
            ]
        ]);


        if($_valideren->check()){

            $_query="select  d_logon from t_authentication where d_logon = ?";

            $_resul=$_PDO->prepare("$_query");

            $_resul->execute([$_POST['logon']]);

            if($_resul->rowCount() > 0){
                require("../php_lib/sendMail.inc.php");
                //  e-mail & database

                while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){
                    $_user=$_row['d_user'];
                }

                $_paswoord=encrypt($_POST['logon'], $_POST['paswoord']);      
                $_nu =time();

                $_resetKey = encrypt("{$_POST['logon']} $_user $_nu", "webo");

                $_resetTime = $_nu + (60*60*20); // 20 uur

                update("t_authentication","d_resetTime='$_resetTime ',
                d_resetKey='$_resetKey',
                d_paswoord='$_paswoord'",["d_logon","=","{$_POST['logon']}"]);

                sendMail($_POST['logon'],"Reset paswoord","<a href='reset_check.php?final_test=1 & rest_key=$_resetKey'> Click hier voor reset</a>",$_header="iest");





            }else{
                Redirect::to("reset_pass.php?error=Deze mail adres bestaat niet &reset=1");
            }

        }else{
            Redirect::to("reset_pass.php?error=".$_valideren->errorValidate()."&reset=1");
        }

    }


    if($_GET['final_test']==1){

        $_nu=time();
       
       
        $_query="select * from t_authentication where d_resetKey='{$_GET['rest_key']}' and d_resetTime > $_nu ";
 
        $_resul=$_PDO->prepare("$_query");

        $_resul->execute([$_POST['logon']]);
        
        
        if($_resul->rowCount() > 0){

          
            update("t_authentication","d_resetKey='',d_resetTime=0 ",["d_resetKey","=","{$_GET['rest_key']}"]);
            
            Redirect::to("login.php?msg= Reset is gelukt,meld u aan");

        }else{
            Redirect::to("reset_pass.php?error= er is iets misgelopen probeer opniew & reset=1");
        }


    }
}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}