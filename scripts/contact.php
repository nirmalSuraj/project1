<?php
try{

    //initialiseren 
    require "../code/initialisatie.inc.php";
    require "../code/session_uitpakken.php";
    //pagina die wij gaan tonen aan klant

    $_tpl="home.tpl";

    if(isset($_POST['send'])){
        //aanmaken van new validatie object
        $_valideren=new Validatie();
        $_valideren->validate($_POST,[

            "naam"=>[
                "charMin"=>2
            ],

            "mail"=>[
                "ad"=>"@"
            ],
            "onderwerp"=>[
                "charmax"=>45,
                "charMin"=>8
            ]
        ]);

        if($_valideren->check()){
require("../php_lib/sendMail.inc.php");
            sendMail ("test",$_POST['onderwerp'],$_POST['mail'],$_header="");
             $_inhoud=" 
    <div class='col-md-7 col-sm-12 regisform form bg-Success' >
    <h1>Mail Verzonden</h1>
     <button class='janee' value='Home'  > <a href='".($_rol != 1?"../scripts/login.php":"../scripts/home_klant.php")."'> Terug</button>
    
     </div>";

        }else{
            Redirect::to("$_srv?error=".$_valideren->errorValidate()."");
        }
    }else{
         $_inhoud=" 
    <div class='col-md-6 col-sm-12 regisform form' id='contact'>
    <form  method='post'  id='form' action='$_srv'>
   <h1>Contact</h1>
   <label >Naam</label>
    <input type='text' name='naam' value='{$_POST['voornaam']}' required>
     <label>U-mail</label>

    <input type='text' name='mail' required> 
       <label>Onderwerp</label>

    <input type='text' name='onderwerp' required minlength='8'>
    <br><br><br><br>
    <br><br><br><br>

   <textarea name='editor1' id='editor1' rows='12' cols='80' required>

  </textarea>
  <input type='submit' name='send' id='submit'>
  <form >
  </div>
  
   <div class='col-md-6 col-sm-12 regisform form' id='info'>
   ".Inlezen("info.html")."
  </div>
  ";

        
    }

   

    $_menu=($_rol == null? 7:3);
    // output voor html
    require("../code/output.inc.php");   


}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}