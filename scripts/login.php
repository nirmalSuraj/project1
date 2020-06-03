<?php
try{

    //initialiseren 
    require "../code/initialisatie.inc.php";

    //pagina die wij gaan tonen aan klant
    $_tpl="home.tpl";
    //persistentLogon is true dan naar klantpagina

    if( persistentLogon() || isset($_SESSION['rol'])){

        if($_SESSION['rol'] == 2){
            Redirect::to("home_admin.php");
       }
            Redirect::to("home_klant.php");
        
    }

    // inlog submit is geklikt dan valideren
    if(isset($_POST['login'])){

        $_mail=$_POST['logon'];

        $_paswoord=$_POST['paswoord'];

        require "../code/loginvalideren.php";

        // als alles correct in gevuld is dan login proces starten
        if($_valideren->check()){

            //alle speciale html tages  uitfilteren 
            $_logon=htmlspecialchars($_mail);
            //encrypten van paswoord
            $_paswoord=encrypt($_logon, $_paswoord);

            //check of dat persist true
            $_persist=isset($_POST['persist']);


            //controleren of dat user bestaat
            $_query="select * from t_authentication where d_logon=? and d_resetTime=?";
            //voorbereiden 
            $_resul=$_PDO->prepare("$_query"); 
            //excuteren
            $_resul->execute([$_logon,0]);
            if($_resul->rowCount() != 0){

                while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){

                    $_logon =$_row['d_logon'];
                    $_index =$_row['d_user'];
                    $_rol =$_row['d_rol'];

                    //control paswoord
                    if($_row['d_paswoord'] != $_paswoord){


                        //gebuiker heeft 10 pogingen om paswoord in te geven 
                        if( $_row['d_faultcntr'] < 10){
                            //fout optellen
                            $_foutteller=$_row['d_faultcntr']+1;
                        }else{
                            $_foutteller=$_row['d_faultcntr'];
                        }

                        //als groter is of gelijk  aan 3 keer is 3 blokeren
                        if($_foutteller >= 3){

                            $_timeOut = time()+(60*60*3);
                            $_msg="Uw account is geblokeerd, probeer terug na 3uur";
                        }else{

                            $_msg="Paswoord of uw gebruikersnaam is niet correct";
                            $_timeOut =0;

                        }

                        //controleren of dat user bestaat
                        $_query="update t_authentication set d_faultcntr=?,d_timeOut=?
                               where d_user='{$_index}'";
                        //voorbereiden 
                        $_resul=$_PDO->prepare("$_query"); 
                        //excuteren
                        $_resul->execute(["$_foutteller","$_timeOut"]);

                        logSecurityInfo($_logon,$_msg);
                        //terug naar loginpagina 
                        Redirect::to("{$_srv}?error={$_msg}");

                    }

                    //als timeout nog niet afgelopen is dan verleng de timeout
                    if($_row['d_timeOut'] > time()){

                        $_timeOut=time() +(60*60*3);
                        $_msg='timeout vergelengd';

                        $_query="update t_authentication set d_timeOut={$_timeOut}
                               where d_user='{$_index}'";

                        $_PDO->query("$_query"); 
                        logSecurityInfo($_logon,$_msg);
                        //terug naar loginpagina 
                        Redirect::to("{$_srv}?error={$_msg}");
                    }
                    //als persistentie true is dan
                    if($_persist){
                        $_salt=time();
                        $_identifier=encrypt($_logon, $_salt);
                        $_token=encrypt(uniqid(rand(), TRUE));
                        $_expire= time()+ (60*60*3);
                        setcookie("auth", "$_identifier:$_token", $_expire);
                        logSecurityInfo($_logon,"persistentie");
                    }else{
                        $_identifier="";
                        $_token="";
                        $_expire= 0; 
                        logSecurityInfo($_logon,"geen persistentie");
                    }

                    //update van t_authentication table
                    $_query="update t_authentication 
                            set 
                            d_token='$_token',
                            d_identifier='$_identifier',
                            d_expire=$_expire,
                            d_faultcntr=0,
                            d_timeOut=0

                            where d_user='{$_index}'";

                    $_PDO->query("$_query"); 
                    //session voorbereiden 
                    $_SESSION['rol']=$_rol;
                    $_SESSION['user']=$_index;
                    $_SESSION['authenticated']=true;
                    $_SESSION['logon']=$_logon;
                    
                    if($_SESSION['rol'] == 2){
                         Redirect::to("home_admin.php");
                    }

                    //als alles ok is dan ridirect naar home pagina van klant
                    Redirect::to("home_klant.php");


                }


            }else{
                $_error="Uw mail of wachtwoord klopt niet";
                
                logSecurityInfo($_logon,$_error);
            }

        }else{
            $_error=$_valideren->errorValidate();

        }

    }



    require "../code/loginform.php";






    $_menu=2;
    // output voor html
    require("../code/output.inc.php");   


}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}
