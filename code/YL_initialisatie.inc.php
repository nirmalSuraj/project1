<?php
session_start();
//$_srv gebruiken we als "action" in onze formulieren
$_srv = $_SERVER['PHP_SELF'];
$_inhoud="";
$_jsInclude = array();
// instantiering van $_PDO 
// (connectie met dbms en selectie van de datbase)
require("../connections/pdo.inc.php");

require_once("../php_lib/authorised.inc.php");
authorised(); 

/// functie om text (html) files in te lezen
require("../php_lib/inlezen.inc.php"); 

?>