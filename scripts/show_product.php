<?php
try{
    require("../code/initialisatie.inc.php");

    require "../code/session_uitpakken.php";
    
 //deze  boolen gaat bijhouden of dat limit onder 10 is
    $_onder_limit=false;
    
  $_toegang=[1,4,5];
    /*om hier binnen te mogen moet de gebruiker langs één van volgende wegen binnen komen 
    -homepagina
    -lijst(car icone)
    -afrekenen (via redirect)
    */
    //om te kunnen shoppen  moet de gebruiker via de juiste weg komen!!

    
    if (!isset($_SESSION["actie"]) || !in_array($_SESSION["actie"],$_toegang) || !isset($_POST['toegang']) || $_POST['toegang'] != 1){

        throw new Exception("illegal access");
    }

    
   $_table=$_POST['table'];
   //soort is waarde van dropdown
    
    if($_POST['soort'] == 1){
       // deze functie heeft de length van een table van sql 
        require "../php_lib/length_table.php";
        
        //als limit minder dan dan tabale length is dan  (limit heeft standard waarde van 10) 
        
        if($_POST['limit'] <= lenth_table('v_selectproducten',"d_index")){
            
            
            require "../code/limit_van_produc.php";
           

        }else{
            $_onder_limit=true;

        } 
      // als minder $_onder_limit waarde dan is dan toon rest van de producten
        if($_onder_limit){
 // als de de limit niet boven de tien is dan is true
            
            require "../code/limit_van_produc.php";
            
           

        }else{
             $_error="Geen producten meer!";
            $_producten ="Producten zijn niet beschikbaar";
            logSecurityInfo($_logon,"Producten zijn niet beschikbaar");
        }
        
        
        
        
  //als soort niet gelijk is aan 1 dan geef de gekozen soort  
    }else{

       require "../php_lib/length_table.php";
        //als limit minder dan tabale length is dan  (limit heeft standard waarde van 10) 
        if($_POST['limit'] <= lenth_table('v_selectproducten',"d_index")){
        
            
            require "../code/limit_van_produc2.php";

        }else{
        // als de de limit niet boven de tien is dan is true
            $_onder_limit=true;

        } 
      // als minder dan is dan toon rest van de producten
        if($_onder_limit){

            require "../code/limit_van_produc2.php";
            

        }else{
           
            $_error="Geen producten meer!";
            
            $_producten="Producten zijn niet beschikbaar";
            
            logSecurityInfo($_logon,"Producten zijn niet beschikbaar");
        }





    }
  


}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}