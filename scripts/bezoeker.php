<?php
try{
 
    //initialiseren 
    require "../code/initialisatie.inc.php";
//require "../class/Session.class.php";
    //pagina die wij gaan tonen aan klant
    $_tpl="bezoeker.tpl";
//Session::show();

         
    
    $_inhoud.=Inlezen("welkome_text_homepagina.html");
 $_inhoud.=Inlezen("img_klant_home.html");



     $_menu=0;
   // output voor html
require("../code/output.inc.php");   


}catch(Exception $e){

    require_once("php_lib/myExceptionHandling.inc");


    echo myExceptionHandling($e, "error/error.csv");


}

