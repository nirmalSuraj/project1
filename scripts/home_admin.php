<?php
try{
    require("../code/initialisatie.inc.php");

    require "../code/session_uitpakken.php";
 
    $_tpl='home_klant.tpl';
    $_menu=4;



    require "../code/output.inc.php";
}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}