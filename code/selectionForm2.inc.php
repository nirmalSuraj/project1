<?php

	 
   $_inhoud.=
       
    "
     <div class='col-lg-6 col-sm-12 regisform form' >
     <form  method='post' id='form' action='$_srv'>
    <fieldset>
    <legend>Personalia</legend>
    <label>Naam</label>
    <input type='text' name='naam'>
    <label >Voornaam</label>
    <input type='text' name='voornaam'>
		<label >Gender</label>";
		$_inhoud.= dropDown("gender","t_gender","d_index","d_sex",$_start=0);
		$_inhoud.="<label >Soort lid</label>";
		$_inhoud.= dropDown("soort","t_rol","d_index","d_rol",$_start=0);
		$_inhoud.=" 
  </fieldset>
  <fieldset>
  <legend>Contact informatie</legend>
    <label >Straat</label>
    <input type='text' name='straat' size='20'>
    <label >Nr </label>
    <input type='text' name='nr' size='10'>
 <label >Postcode</label>
 <input type='text' name='postcode' size='10'>
  
    <label >Gemeente</label>
    <input type='text' name='gemeente' size='10'>
    <label>Telefoon</label>
   	<input type='text' name='tel' size='10'>
 	  <label>E-mail</label>
    <input type='text' name='mail' size='40'> 
    </fieldset>
		<input name='bekijken' id='submit' type='submit' value='verzenden'>
    </form>
    </div>
    ";
?>