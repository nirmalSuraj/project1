<?php

/*
 indeze script vaan de length van de table eruithalen
 next waarde te kunnen manipuleren
*/
try{
    require("../code/initialisatie.inc.php");

    require "../code/session_uitpakken.php";

 if($_POST['get_len'] =="yes"){
         require "../php_lib/length_table.php";
        echo lenth_table($_POST['table'],$_POST['index'];

    }
    
    
    }catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}