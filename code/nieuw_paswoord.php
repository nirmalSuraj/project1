<?php
   $_inhoud.= "
   <div class='col-lg-6 col-sm-12  form'>
   <h1>Nieuw paswoord</h1>
    <form  method='post' id='form' action='$_srv'>
    <fieldset>
     <label>Paswoord</label>
    <input type='password' name='paswoord' id='pass'size='40' required >
     <label>Herhaal uw paswoord</label>
    <input type='password' id='pass_rep' name='her_paswoord' required > 
    </fieldset>
		<input name='aanpassen' id='submit' type='submit' value='Aanpassen'>
        
    </form>
    
     <div>";
?>