<?php
$_inhoud= "
   
   <div class='col-lg-6 col-sm-12 regisform form'>
   <h1>".($_SESSION["actie"] == 9?"Soort toevogen":"Zoeken")."</h1>
    <form  method='post' id='form' action='$_srv'>
    <fieldset>
   
    ";
       $_inhoud.="<label >Soort </label>
        <input type='text' name='naam'  >
        
     
	 
    </fieldset>
		<input name='bekijken' id='submit' type='submit' value='verzenden'>
        
    </form>
    
     <div>";