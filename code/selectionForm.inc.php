<?php

	 
   $_inhoud.= "
   
   <div class='col-lg-6 col-sm-12 regisform form' >
   <h1>Registeren</h1>
    <form  method='post' id='form' action='$_srv'>
    <fieldset>
   
    ";
       $_inhoud.="<label >Aanspreekvorm</label>";
		$_inhoud.= dropDown("aanpreek","t_aanspreektitel","d_index","d_aanspreekTitel",$_start=0);
    $_inhoud.="<label>Naam</label>
    <input type='text' name='naam' value='{$_POST['naam']}' >
    <label >Voornaam</label>
    <input type='text' name='voornaam' value='{$_POST['voornaam']}' >
     <label >Geboortedatum</label>
    <input type='date' name='geboortedatum' id='date'>
		<label >Gender</label>";
		$_inhoud.= dropDown("gender","t_gender","d_index","d_sex",$_start=0);
		
		$_inhoud.=" 

    <label >Straat</label>
    <input type='text' name='straat' value='{$_POST['straat']}' >
    <label >Nr</label>
    <input type='text' name='nr' value='{$_POST['nr']}'  >
    <label >Postcode</label>
   ";
   $_inhoud.= dropDown("postcode","t_gemeente","d_postcode","d_postcode",$_start=0);
            $_inhoud.=  "
    <label >Gemeente</label>
    ".dropDown("gemeente","t_gemeente","d_gemeentenaam","d_gemeentenaam",$_start=0)
    ."
     <label >telefoon</label>
   	<input type='text' name='tel' size='10' value='{$_POST['tel']}'  placeholder='03/....'>
 	  <label>E-mail</label>
    <input type='text' name='mail' value='{$_POST['mail']}' > 
     <label>Paswoord</label>
    <input type='password' name='paswoord'  id='pass' >
     <label>Herhaal uw paswoord</label>
    <input type='password' name='her_paswoord' id='pass_rep' > 
    </fieldset>
		<input name='registeren' id='submit' type='submit' value='verzenden'>
        
    </form>
    
     <div>";
?>