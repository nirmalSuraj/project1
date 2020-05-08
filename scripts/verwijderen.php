<?php
try{
    require("../code/initialisatie.inc.php");

    require "../code/session_uitpakken.php";
    $_tpl='shoppen_klant.tpl';
    //om te kunnen shoppen  moet de gebruiker via de juiste weg komen!!
    $_toegang=[10];
    /*om hier te binnen moegen moet langs éé van volgende wegen binnen komen 
    -select
    */

    if (!isset($_SESSION["actie"]) || !in_array($_SESSION["actie"],$_toegang)){

        throw new Exception("illegal access");
    }


    /*
     in indeze functie kan admin mederwerker nodige zaken verwijderen bv:producten,klanten
    */


    //verwijder

    if(isset($_POST['verwijder'])){

        if($_SESSION['tabelIndex'] == 'v_full_gegevens_users'){
            /* indien $_SESSION index is niet set dat wil zeggen dat waarde komt via de kant van admin met post
            als het niet set copier de waarde van post naar $_SESSION index 

            */

            //$_SESSION['index']=( $_SESSION['index'] !=""? $_SESSION['index']:$_POST['index']);
            //als tablegelijk aan view dan geef de table waarde
            $_SESSION['tabelIndex']=($_SESSION['tabelIndex'] != 'v_full_gegevens_users'?$_SESSION['tabelIndex']:'t_users');  

            //in t_authentication is index var ingegeven als (d_user). zodus als table index == t_authentication dan d_user
            $_index=($_SESSION['tabelIndex'] != 't_authentication'?"d_index":"d_user");
            //verwijderen 
            delete($_SESSION['tabelIndex'],[$_index,"=",$_POST['index'],"and","d_voornaam","=",$_POST['voornaam']]);
            delete("t_authentication",[$_index,"=",$_POST['index']]);
            //check of deze peroon nog bestaat? indien nee error=niet gelukt anderes msg=gelukt

            $_query="select * from {$_SESSION['tabelIndex']} where d_user={$_POST['index']}";

            $_resul=$_PDO->query("$_query");
            //gegevens bestaan niet dan throw database inconsistentie 
            if($_resul->rowCount() > 0){
                logSecurityInfo($_user,"id:{$_POST['index']}, {$_POST['voornaam']} is verwijdert");
                Redirect::to("a_admin.php?error=Niet gelukt, er is iets misgelopen");

            }else{
                logSecurityInfo($_user,"id:{$_POST['index']}, {$_POST['voornaam']} iets misgelopen tijdens het verwijderen");
                Redirect::to("a_admin.php?msg=Verwijdert");
            }   

        }


        if($_SESSION['tabelIndex'] == 'v_selectproducten'){
            /* indien $_SESSION index is niet set dat wil zeggen dat waarde komt via de kant van admin met post
            als het niet set copier de waarde van post naar $_SESSION index 
            */
            //$_SESSION['index']=( $_SESSION['index'] !=""? $_SESSION['index']:$_POST['index']);
            //als tablegelijk aan view dan geef de table waarde
            $_SESSION['tabelIndex']=($_SESSION['tabelIndex'] != 'v_selectproducten'?$_SESSION['tabelIndex']:'t_producten');  

            //in t_authentication is index var ingegeven als (d_user). zodus als table index == t_authentication dan d_user
            $_index=($_SESSION['tabelIndex'] != 't_authentication'?"d_index":"d_user");
            //verwijderen 
            delete($_SESSION['tabelIndex'],[$_index,"=",$_POST['index']]);


            $_query="select * from {$_SESSION['tabelIndex']} where $_index={$_POST['index']}";

            $_resul=$_PDO->query("$_query");
            //gegevens bestaan niet dan throw database inconsistentie 
            if($_resul->rowCount() > 0){
                logSecurityInfo($_user,"heeft id:{$_POST['index']}, {$_POST['naam']} is verwijdert");
                Redirect::to("a_admin.php?error=Niet gelukt, er is iets misgelopen");

            }else{
                logSecurityInfo($_user,"id:{$_POST['index']}, {$_POST['naam']} iets misgelopen tijdens het verwijderen");
                Redirect::to("a_admin.php?msg=Verwijdert");
            }   

        }

    }



    /* als jij op deze pagina binnen komt dan word menu waarde mee gestuurd via superglobal get $_get['menu'] of post 
   afhankelijk hoe jij binnenkomt
*/
    $_menu=$_SESSION["menu"];



    require "../code/output.inc.php";
}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}