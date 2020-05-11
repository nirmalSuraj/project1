<?php
session_start();


//$_srv gebruiken we als "action" in onze formulieren
$_srv = $_SERVER['PHP_SELF']; 
$_jsInclude=["../js/main.js",
             "../js/nav_regelen.js",
              
             "../js/soort_product.js",
             "../js/add_in_list.js",
             "../js/show_list.js",
             "../js/factuurNummer.js",
             "../js/car.js",
             "../js/submit.js"
            ];

//*********** includes  
  
// instantiering van $_PDO 
// (connectie met dbms en selectie van de datbase)
require("../connections/pdo.inc.php");
//authorised???
//require_once("../php_lib/authorised.inc.php");
//authorised();
//deze klaas zorgt voor  Redirect
require("../class/Redirect.class.php");
//functie om "radio-buttons" samen te stellen
include("../php_lib/Button.php");
//bij een error toon error
$_error=(!isset($_GET['error'])?"":$_GET['error']);
//communicatie var
$_msg=(!isset($_GET['msg'])?"":$_GET['msg'] );

// model (database) based drop-downs  
require("../php_lib/dropDown.inc.php");







// initialisatie van variabelen
$_inhoud="";
$_SESSION['tabelIndex']="";
?>