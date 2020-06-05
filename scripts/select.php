<?php
try{

    require "../code/initialisatie.inc.php";
    require "../code/session_uitpakken.php";

    $_tpl='home_klant.tpl';
    /* is het script op een "legale" manier opgestart
* is er een actie gedefinieerd
*
* anders --> illegale toegang
***************************************************/

    if (! isset($_GET["actie"]))  // geen actie gedefinieerd
    {
        throw new Exception("illegal access");
    }

    // copier de actie vanuit $_get naar de sessie variabele	
    $_SESSION["actie"]= $_GET["actie"];

    if($_SESSION['tabelIndex'] == ""){
        Redirect::to("a_admin.php?error=maak eerst een keuze");

    }

    // verschillende details voor de verschillende acties	
    // $_srv --> volgende functie/script	
    // $_SESSION['comment']	--> text die in het commentaar-veld 
    //                          van de template komt
    // $_start --> start positie voor de drop-downs 
    //             (soort-lid & gender)	

    switch ($_SESSION["actie"])					
    {		
        case 7: // bekijken
            $_srv= "toon.php";
            
            break;

        case 8: // aanpassen
            $_srv= "../scripts/toon.php";
            $_SESSION['h1']="aanpassen";
            if($_SESSION['tabelIndex'] == "t_factuur"){
                Redirect::to("a_admin.php?error=t_factuur kan niet aangepast worden");

            }


            break;

        case 9: // toevoegen 
            $_srv= "../scripts/a_toevoegen.php";
            $_SESSION['h1']="toevoegen";
            if($_SESSION['tabelIndex'] == "v_full_gegevens_users"){
                Redirect::to("a_admin.php?error=leden toevoegen  is niet moegelijk");

            }
            if($_SESSION['tabelIndex'] == "t_factuur"){
                Redirect::to("a_admin.php?error=t_factuur kan niet toegevoed worden");

            }

            break;
        case 10: // verwijderen
            $_srv= "../scripts/toon.php";
            if($_SESSION['tabelIndex'] == "t_factuur"){
                Redirect::to("a_admin.php?error=t_factuur kunnen wij niet verwijderen");

            }

            break;

        case 11: // factuur
            $_srv= "../scripts/toon.php";
            if($_SESSION['tabelIndex'] != "t_factuur"){
                Redirect::to("a_admin.php");

            }

            break;



        default: // alle andere waarden
            throw new Exception("illegal action");

    }

    if($_SESSION['tabelIndex'] != "v_selectproducten"){
        require "../code/selectionForm2.inc.php";
    }else{
        require "../code/admin_producten.php";
    }
    //form voor toevoegen
    if($_SESSION['tabelIndex'] == "v_selectproducten" && $_SESSION["actie"] == 9){

        require("../code/producten_update_toevoeg.php");
    }
    if($_SESSION['tabelIndex'] == "t_soort"  && $_SESSION["actie"] == 9 ){
        require("../code/soort_update_toevoegen.php");
    }

    if($_SESSION['tabelIndex'] == "t_soort" ){
        require("../code/soort_update_toevoegen.php");
    }
    
    $_inhoud.="
    <button class='janee'> <a href='a_admin.php'>Terug</a></button>
     </form>
    </div>";


    $_menu=5;



    require "../code/output.inc.php";
}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}
