<?php
try{

    require "../code/initialisatie.inc.php";
    require "../code/session_uitpakken.php";

    $_tpl='home_klant.tpl';
    /* is het script op een "legale" manier opgestart
* is er een actie gedefinieerd
*
* anders --> illegale toegang
***************************************************/
    
    if (! isset($_GET["actie"]))  // geen actie gedefinieerd
    {
        throw new Exception("illegal access");
    }

    // copier de actie vanuit $_get naar de sessie variabele	
    $_SESSION["actie"]= $_GET["actie"];
 
    // verschillende details voor de verschillende acties	
    // $_srv --> volgende functie/script	
    // $_SESSION['comment']	--> text die in het commentaar-veld 
    //                          van de template komt
    // $_start --> start positie voor de drop-downs 
    //             (soort-lid & gender)	
    switch ($_SESSION["actie"])					
    {		
        case 1: // shoppen
            $_srv= "shoppen.php";
            //$_SESSION['comment']= "L_lezen_C.html";
            //$_start=0;

            Redirect::to("$_srv");
            //$_requierd="";
            break;

        case 2: // factuur bekijken
            $_srv= "../scripts/factuur.php";
             Redirect::to("$_srv");

            break;

        case 3: // profiel
            $_srv= "../scripts/klant_profiel.php";
             Redirect::to("$_srv");
            break;
        case 4: // lijst bekijken 
            $_srv= "../scripts/show_list.php";
            Redirect::to("$_srv");

            break;
        case 5: // laaste stap van afrekenen
            $_srv= "../scripts/afrekenen.php";
            Redirect::to("$_srv");

            break;
        case 6: // aanpassen
           $_srv= "../scripts/klant_data_aanpassen.php";
           

            break;
            
        
        default: // alle andere waarden
            throw new Exception("illegal action");

    }
    
    if(!isset($_SESSION['tabelIndex']) || $_SESSION['tabelIndex'] == "" ){
        Redirect::to("klant_profiel.php?error=maak een keuze");
    }else{
        
        $_SESSION['index']=$_user;
        $_SESSION['menu']=3;
         Redirect::to("aanpassen.php");
        
    }
    
 /*   
  $_index=($_SESSION['tabelIndex'] != 't_authentication'?"d_index":"d_user");
    $_query="select * from {$_SESSION['tabelIndex']} where $_index={$_user}";
    
        $_resul=$_PDO->query("$_query");
        
        if($_resul->rowCount() <= 0){
            throw new PDOException("database inconsistentie ");
        }
        
         while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){
             
             if($_SESSION['tabelIndex'] == "t_users"){
                  require("../code/user_gegevens.php");// selectie formulier
             }
             
             if($_SESSION['tabelIndex'] == "t_bedrijf"){
                  require("../code/bedrijf_gegevens.php");// selectie formulier
             }
             if($_SESSION['tabelIndex'] == "t_authentication"){
                 
                  require("../code/nieuw_paswoord.php");// selectie formulier
             }
      
            
         }



*/
    $_menu=3;



    require "../code/output.inc.php";
}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}
