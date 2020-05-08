<?php
try{
    require("../code/initialisatie.inc.php");

    require "../code/session_uitpakken.php";
    $_tpl='shoppen_klant.tpl';
    $_toegang=[7,8,10,9];
    //om te kunnen shoppen  moet de gebruiker via de juiste weg komen!!
    /*om hier te binnen moegen moet langs éé van volgende wegen binnen komen 

    */
    if (!isset($_SESSION["actie"]) || !in_array($_SESSION["actie"],$_toegang)){

        throw new Exception("illegal access");
    }


    if($_SESSION['tabelIndex'] != "v_selectproducten"){
        $_create_table="v_full_gegevens_users";
    }else{
         $_create_table=$_SESSION['tabelIndex'];
    }

    require "../code/inputUitpakken.inc.php";
    require("../code/useCreateSelect.inc.php");

    $_result = $_PDO -> query("$_query"); 

    // verwerk het resultaat van de query		
    if ($_result -> rowCount() > 0)
    {
        $_inhoud="  <div class='col-md-12'><table>";
        while ($_row = $_result -> fetch(PDO::FETCH_ASSOC)) 
        {
           
                
                require("../code/toonData.inc.php"); 
            



        }
        $_inhoud.="</table></div>";
    }
    else // geen resultaten voor de gegeven input
    {
        $_inhoud = "<br><br><br><br><br><br><h2>Geen records gevonden voor deze input</h2><br><br><br><br><br><br><h2>Lid verwijderd.</h2>";
    }	



    $_menu=5;



    require "../code/output.inc.php";
}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}