<?php
try{
    require "../code/initialisatie.inc.php";
    require "../code/session_uitpakken.php";

    $_tpl='shoppen_klant.tpl';
 
    $_toegang=[1,5,4];
    //om te kunnen shoppen  moet de gebruiker via de juiste weg komen!!
     /*om hier te binnen moegen moet langs éé van volgende wegen binnen komen 
    -select (1)
    -afreken (5)
    -shoppen
    */
   if (!isset($_SESSION["actie"]) || !in_array($_SESSION["actie"],$_toegang)){

        throw new Exception("illegal access");
    }

    
  
    
    //geef de gebruiker opties voor soort producten te kunnen kopen
  
     $_inhoud.= dropDown("soort", "t_soort", "d_index", "d_soorNaam", $_start = 0, $_select = 0);


    
$_producten.="<button id='volgende' >Meer</button>";


    $_menu=3;



    require "../code/output.inc.php";
}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}
