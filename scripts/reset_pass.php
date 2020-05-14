<?php

try{
    require("../code/initialisatie.inc.php");

    require "../code/session_uitpakken.php";

    if(!isset($_GET['reset']) && $_GET['reset'] == 1 ){

        throw new Exception("Illegal Access");
    }

    $_tpl="home.tpl";


    if(isset($_GET['reset']) && $_GET['reset']){
        $_inhoud="<div class='col-lg-6 col-sm-12 loginForm  form'>
<h1>Reset paswoord</h1>

<form  method='post' id='form' action='reset_check.php'>
    <fieldset>

     <label>Email</label>
    <input type='text' name='logon'>

     <label>paswoord </label>
    <input type='password' name='paswoord' id='pass' >

        <label>paswoord herhalen</label>
    <input type='password' name='paswoord_her' id='pass' >




		<input name='reset_pass' id='submit' type='submit' value='Reset'>

    </form>

     </div>";

    }
    
    

    $_menu=1;



    require "../code/output.inc.php";
}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}
