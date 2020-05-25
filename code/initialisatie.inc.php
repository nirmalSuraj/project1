<?php
session_start();
//$_srv gebruiken we als "action" in onze formulieren
$_srv = $_SERVER['PHP_SELF'];
$_inhoud="";
// instantiering van $_PDO 
// (connectie met dbms en selectie van de datbase)
require("../connections/pdo.inc.php");
// model (database) based drop-downs  
require("../php_lib/authorised.inc.php");


// model (database) based drop-downs  
require("../php_lib/dropDown.inc.php");
// model (database) based drop-downs  
require("../php_lib/distinct_drop.php");
// functie om selectie query samen te stellen  
require("../php_lib/createSelect.inc.php");  
// primary key van t_gemeente p te zoeken op basis van gemeente naam en/of postcode
require("../php_lib/PK_t_gemeente.inc.php");

// filter elke waarde dat binnen komt
require("../php_lib/cleanInput.inc.php");
//onthouden van gebruiker 
require("../php_lib/persistentLogon.inc.php");
///deze klaas valideert formulier, werking van deze klaas gaat gepaard met Variabe.class
require("../class/validatie.class.php");
require("../class/Variabe.class.php");
//encrypt functie
require("../php_lib/encrypt.inc.php");
//deze klaas zorgt voor  Redirect
require("../class/Redirect.class.php");
//text bestand lezen
require("../php_lib/inlezen.inc.php");
//
require("../php_lib/logSecurityInfo.inc.php");
//funtie voor data te inserten in database
require("../php_lib/insert.inc.php");
//funtie voor data te updaten in database
require("../php_lib/update.inc.php");
//funtie voor data te iverwijderen in database
require("../php_lib/delete.inc.php");
//functie om "radio-buttons" samen te stellen
include("../php_lib/radioButton.inc.php");
//bij een error toon error
$_error=(!isset($_GET['error'])?"":$_GET['error']);
//communicatie var
$_msg=(!isset($_GET['msg'])?"":$_GET['msg'] );


if($_SESSION['rol'] != 2 && $_SESSION['rol'] == 1){
    
$_jsInclude=["../js/main.js",
             "../js/nav_regelen.js",

             "../js/soort_product.js",
             "../js/add_in_list.js",
             "../js/show_list.js",
             "../js/factuurNummer.js",
             "../js/car.js",
         
             "../js/copyright.js",
             "../js/limit.js",
             "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js",
             "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js",
             "../js/modal.js",
            "../ckeditor/ckeditor.js",
             "../js/editor.js"
            ];
    
}else if($_SESSION['rol'] != 1 || $_SESSION['rol'] == null){
    
   
    $_jsInclude=["../js/main.js",
             "../js/nav_regelen.js",
                                       
         
             "../js/factuurNummer.js",
             "../js/car.js",
             "../js/submit.js",
             "../js/copyright.js",
             "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js",
             "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js",
             "../js/modal.js",
                "../ckeditor/ckeditor.js",
                 "../js/editor.js"
            ];
}


authorised();






/*




require("../php_lib/is_upper.inc.php");

require("../php_lib/menu.inc.php");

require("../php_lib/radioButton.inc.php");



require("../code/inputUitpakken.inc.php");
require("../code/kasticket.php");
    */
?>