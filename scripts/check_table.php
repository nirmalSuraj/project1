<?php
try{
    require("../code/initialisatie.inc.php");

    require "../code/session_uitpakken.php";

    /*

 indeze script gaan zien of dat producten al geselecteerd zijn, indien ja tovoegenkop blijft verwijderd
  en standardwaarde wordt niet toegevoed.
 */

    //om te kunnen shoppen  moet de gebruiker via de juiste weg komen!!
    $_toegang=[1,4];
    //om te kunnen shoppen  moet de gebruiker via de juiste weg komen!!
     /*om hier te binnen moegen moet langs éé van volgende wegen binnen komen 
    -list (car)
    -shoppen 
    */
    
    if (!isset($_SESSION["actie"]) || !in_array($_SESSION["actie"],$_toegang)|| !isset($_POST['toegang']) || $_POST['toegang'] != "ja"){

        throw new Exception("illegal access");
    }


    $_query="select * from t_list where t_producten_d_index = ?";
    //voorbereiden 
    $_resul=$_PDO->prepare("$_query"); 
    //excuteren
    $_resul->execute([$_POST['id']]);
    if($_resul->rowCount() > 0){
        while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){
             echo true."-{$_row['d_aantal']}";
        }

     
       
        
    }else{
      echo false; 
    }







}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}