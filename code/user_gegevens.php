<?php
   
require "../php_lib/get_val.php";
require "../php_lib/check_old_val.php";
//$_waarde,$_table,$_index
$_gender=get_val_data("d_sex","v_full_gegevens_users","d_index",$_SESSION['index']);
$_aanspreek=get_val_data("d_aanspreekTitel","v_full_gegevens_users","d_index",$_SESSION['index']);

   $_inhoud.= "
   
   <div class='col-lg-6 col-sm-12 regisform form'>
   <h1>Aanpassen</h1>
    <form  method='post' id='form' action='$_srv'>
    <fieldset>
   
    ";
       $_inhoud.="<label >Huidige aanspreekvorm</label>
        <input type='text' name='old_aans' value='$_aanspreek' readonly >
        <label >Aanpassen</label>
       ";
		$_inhoud.= dropDown("aanpreek","t_aanspreektitel","d_index","d_aanspreekTitel",$_start=0);
    $_inhoud.="<label>Naam</label>
    <input type='text' name='naam' value='{$_row['d_naam']}' >
    <label >Voornaam</label>
    <input type='text' name='voornaam' value='{$_row['d_voornaam']}' >
     <label >Geboortedatum</label>
    <input type='date' name='geboortedatum' value='{$_row['d_geboortedatum']}'>
		<label >Gender </label>
     <input type='text' name='old_gen' value='$_gender' readonly >
     <label >Aanpas gender </label>
        ";
		$_inhoud.= dropDown("gender","t_gender","d_index","d_sex",$_start=0);
		
		$_inhoud.=" 

    <label >Straat</label>
    <input type='text' name='straat' value='{$_row['d_straat']}' size='20'>
    <label >Nr</label>
    <input type='text' name='nr' value='{$_row['d_huisNummer']}' size='10'>
    <label >Postcode</label>
   ";
   $_inhoud.= "<input type='text' name='postcode' value='".get_val_data("d_postcode","v_full_gegevens_users","d_index",$_SESSION['index'])."' size='10'>";
            $_inhoud.=  "
    <label >Gemeente</label>
    "."<input type='text' name='gemeente' value='".get_val_data("d_gemeentenaam","v_full_gegevens_users","d_index",$_SESSION['index'])."' size='10'>"
    ."
     <label >telefoon</label>
   	<input type='text' name='tel' size='10' value='{$_row['d_telefoonnummer']}'  placeholder='03/....'>
 	  <label>E-mail</label>
    <input type='text' name='mail' value='{$_row['d_email']}' size='40'> 
    </fieldset>
		<input name='aanpassen' id='submit' type='submit' value='Aanpassen'>
        
    </form>
    
     <div>";
?>