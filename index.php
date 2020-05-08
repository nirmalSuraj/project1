<?php

try{
 require"/class/Redirect.class.php";
     
    Redirect::to("scripts/bezoeker.php");
    
}catch(Exception $e){
    
    require_once("php_lib/myExceptionHandling.inc.php");
    
    myExceptionHandling($e, "error/error.csv");
    
    
}