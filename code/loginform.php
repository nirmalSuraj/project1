<?php

$_inhoud.="
<div class='col-lg-6 col-sm-12 loginForm  form'>
<h1>Login</h1>

<form  method='post' id='form' action='$_srv'>
    <fieldset>
   
     <label>Gebruikers naam</label>
    <input type='text' name='logon' value='{$_POST['logon']}' >
   
     <label>paswoord</label>
    <input type='password' name='paswoord' id='pass' >
    <label id='label'>Ingelogd blijven <input type='checkbox' name='persist' id='checkb'value='Ingelogd blijven' > </label>
     
   
     <a href='#' id='pvg'>Paswoord vergeten</a>
     

		<input name='login' id='submit' type='submit' value='login'>
        
    </form>
    
     </div>";
   


