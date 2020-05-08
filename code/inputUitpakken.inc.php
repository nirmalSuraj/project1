<?php
;

// verwerk inhoud van het formulier	
$_index=$_POST["index"];
$_aanpreek =$_POST["aanpreek"];
$_naam =$_POST["naam"];
$_voornaam = $_POST["voornaam"];
$_straat = $_POST["straat"];
$_nr = $_POST["nr"];
$_telefoon = $_POST["tel"];
$_gemeenteNaam = $_POST["gemeente"];
$_postcode = $_POST["postcode"];
$_geboortedatum = $_POST["geboortedatum"];
$_mail = $_POST["mail"];
$_gender =$_POST["gender"];
$_paswoord =$_POST["paswoord"];
$_her_paswoord =$_POST["her_paswoord"];
$_pk=PK_t_gemeente($_postcode, $_gemeenteNaam);
$_soort=$_POST["soort"];


///var voor bedrijf

$_bedrijf=$_POST['bedrijf'];

$_btw=$_POST['btw'];



/*toevoegen*/







?>