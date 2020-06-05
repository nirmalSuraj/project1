<?php
/*******************************************
*    output
********************************************/  
//$_smarty instantieren en initialiseren  

require_once("../smarty/mySmarty.inc.php");
//functie om "menu" samen te stellen
require_once("../php_lib/menu.inc.php");
//functie om tekst/html in te lezen
require_once("../php_lib/inlezen.inc.php");

// We kennen de variabelen toe
$_smarty->assign('inhoud', $_inhoud);
$_smarty->assign('producten', $_producten);
$_smarty->assign('producten', $_producten);

$_smarty->assign('modal', $_modal);
$_smarty->assign("header_modal",$_SESSION["gekozen"]);
$_smarty->assign('logo',($_rol == 1?"home_klant.php":"home_admin.php"));
$_smarty->assign('menu',menu($_menu));
$_smarty->assign('msg',$_msg);
$_smarty->assign('error',$_error);
$_smarty->assign('jsInclude',$_jsInclude);
// display it


$_smarty->display($_tpl);
?>