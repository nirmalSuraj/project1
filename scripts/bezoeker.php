<?php
try{
 
    //initialiseren 
    require "../code/initialisatie.inc.php";
//require "../class/Session.class.php";
    //pagina die wij gaan tonen aan klant
    $_tpl="bezoeker.tpl";
//Session::show();
  
    

        



     $_menu=0;
   // output voor html
require("../code/output.inc.php");   


}catch(Exception $e){

    require_once("php_lib/myExceptionHandling.inc");


    echo myExceptionHandling($e, "error/error.csv");


}

