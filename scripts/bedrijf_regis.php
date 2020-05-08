<?php
try{
    require'../code/initialisatie.inc.php';
    require'../code/session_uitpakken.php';

    $_tpl="home.tpl";
    //  selectie from ophalen

    if($_POST['bedrijf_regis']){

        // white ruimte word verwijdert
        //delete_whitepace();

       require'../code/bedrijf_validatie.php';

        //als elke input is juist ingevuld dan insert els 
        if($_valideren->check()){
            require "../code/inputUitpakken.inc.php";
            //controleren of dat deze gegevens uniek zijn 
            //query

            $_query="select * from t_bedrijf where d_btw =?";
            $_resul=$_PDO->prepare("$_query"); 

            $_resul->execute([$_btw]); 
            //bestaat deze bedrijf?
            if($_resul->rowCount() > 0){
                //als het deze 
                $_error.="Deze BTW  is al geregistreerd<br>";

                logSecurityInfo($_logon,$_error);

                Redirect::to("$_srv?error={$_error}");
            }else{
             //controleren op bedrijf naam
                $_query="select * from t_bedrijf where d_naam =?";
                $_resul=$_PDO->prepare("$_query"); 

                $_resul->execute([$_bedrijf]); 
                //bestaat deze bedrijf?
                if($_resul->rowCount() > 0){
                    //als het deze 
                    $_error.="deze $_bdrijf is al geregistreerd";

                    logSecurityInfo($_logon,$_error);

                    Redirect::to("$_srv?error={$_error}");
                }else{
                    insert("t_bedrijf","d_naam,d_btw,d_straat,d_huisNummer,t_users_d_index,t_gemeente_d_index,d_telefoonnummer",
                           [
                               $_bedrijf,
                               $_btw,
                               $_straat,
                               $_nr,
                               $_user,
                               $_pk,
                               $_telefoon
                           ]);
                    logSecurityInfo($_logon,"gegevens bedrijf ingevuld");
                    Redirect::to("home_klant.php");
                }

            }


        }else{
            $_error=$_valideren->errorValidate();
        }
    }

    require("../code/bedrijf.php");


    $_menu=1;
    // output voor html
    require("../code/output.inc.php");


}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}

