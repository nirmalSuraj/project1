<?php
$_inhoud= "
   <div class='col-lg-6 col-sm-12  form'>
   <h1>{$_SESSION['h1']}</h1>
    <form  method='post' id='form' action='$_srv' enctype='multipart/form-data'>
    <fieldset>
     <label>img</label>
    <input type='file'  name='img'>".
    $_inhoud=($_SESSION["actie"]!= 9?"<label>Huidige soort</label>
    <input type='text' name='old_soort' value='{$_row['d_soorNaam']}' readonly >":"" )

    ."

     <label>Soort product</label>
    ".dropDown("soort", 't_soort', "d_index", "d_soorNaam", $_start = 0, $_select = 0)."

     <label>product naam</label>
    <input type='text' name='naam' value='{$_row['d_productNaam']}'>
    <label>prijs</label>
    <input type='text' name='prijs' value='{$_row['d_prijs']}'>
    <label>BTW</label>
    ".
    $_inhoud=($_SESSION["actie"]!= 9?"<input type='text' name='btw' value='{$_row['d_btw']}'>": dropDown("btw", 't_btw', "d_index", "d_btw", $_start = 0, $_select = 0))

    ."
     <label>kg/ps</label>
    <input type='text' name='psofkg' value='{$_row['d_psofkg']}'> 
    <label>Stock</label>
    <input type='text' name='stock' value='{$_row['d_stock']}'> 
    <label>Korte beschrijving</label>
    <input type='text' name='beschrijv' value='{$_row['d_beschrijving']}'>
    </fieldset>
         <button class='janee' ><a href='a_admin.php'>Back</a></button>
		<input name='aanpassen' id='submit' type='submit' value='{$_SESSION['h1']}'>

    </form>

     <div>";