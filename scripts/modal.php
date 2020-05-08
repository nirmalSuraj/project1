<?php
try{
    require("../code/initialisatie.inc.php");

    require "../code/session_uitpakken.php";

    /*in deze script gaan wij peroonlijke gegevens van klanten tonen via modal en op click naar pagina aanpassen.php,toevoegen en verwijderen

wij komen in deze script binnen via moadal.js(ajax)

*/
    unset($_SESSION['index']);

    $_toegang=[7,8,10];
    /*om hier binnen te mogen moet de gebruiker langs één van volgende wegen binnen komen 
    -homepagina
    -lijst(car icone)
    -afrekenen (via redirect)
    */
    //om te kunnen shoppen  moet de gebruiker via de juiste weg komen!!


    if (!isset($_SESSION["actie"]) || !in_array($_SESSION["actie"],$_toegang) || !isset($_POST['toegang']) || $_POST['toegang'] != 1){

        throw new Exception("illegal access");
    }
 
    $_query="select * from ".($_SESSION['tabelIndex']=='t_factuur'?'v_full_gegevens_users':$_SESSION['tabelIndex'])." where d_index = ?";

    $_resul = $_PDO->prepare("$_query");
    $_resul->execute([$_POST["index"]]);
  
    if($_resul->rowCount() == 0 ){
 
        throw new Exception("database inconsistent");
  
    }else{
        while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){
            if($_SESSION['tabelIndex'] != "v_selectproducten"){
                echo $_row['d_soortNaam']." ".
                    $_row['d_naam'].
                    "<br><br>" .
                    $_row['d_sex'].
                    " / " .
                    $_row['d_rol']. 
                    "<br><br>".
                    $_row['d_straat']."&nbsp;&nbsp;".
                    $_row['d_huisNummer']."&nbsp;&nbsp;<br>".
                    $_row['d_postcode']."&nbsp;&nbsp;". 
                    $_row['d_gemeentenaam']. 
                    "<br><br>". 
                    "Tel : ".$_row['d_telefoonnummer'].
                    "<br><br><br>". 
                    "Mail: ".$_row['d_email'];

                if($_SESSION['tabelIndex'] == "t_factuur" ){
                    $_SESSION["menu"]=5;
                    $_SESSION['admin']=true;
                    $_SESSION['index']=$_row['d_index'];
                    echo "<form  method='post' action='factuur.php'>

						<input  name='factuur' class='janee' type='submit' value='factuur' >
						</form>";
                }
                
            }else{
                echo "<div class='row'><div class='col-md-12 col-sm-12 producten '>


                    <img src='{$_row['d_img']}' alt='' ><br>
                    <label> {$_row['d_productNaam']}  </label><br>
                    <label><strong>prijs:</strong> {$_row['d_prijs']} € per {$_row['d_psofkg']}</label><br>
                        <label><strong>btw:</strong> {$_row['d_btw']}</label><br>
                            <label><strong>stock:</strong>".($_row['d_stock']==0?"Niet beschikbaar":$_row['d_stock']) ."</label>
                                <input type='hidden' value='{$_row['d_index']}'><br>
                                <label>Beschrijving:</label>
                               <label>{$_row['d_beschrijving']} </label>

                                </div>
                                <hr>

                                </div>
                                </div>

                                ";

            }

            switch ($_SESSION["actie"])			
            {		
                case 7: //lezen

                    break;	
/* aangezien dat wij verschillende zaken gaan moeten verwijderen uit verschillende table met verschillende namen.
 daar voor gaan wij if en else gebruiken voor hidden parameters 
*/
                case 10:// verwijderen
                    $_SESSION["menu"]=5;
                    echo "<form  method=post action=verwijderen.php >
                    ";
                        if($_SESSION['tabelIndex'] == "v_full_gegevens_users"){
                            echo " <input type=hidden name=index  value='".($_row['d_index'])."'>
        <input type =hidden name=voornaam value='".$_row['d_voornaam']."'>
        <input type =hidden name=naam value='".$_row['d_naam']."'>";
                        }else if($_SESSION['tabelIndex'] == "v_selectproducten"){
                            echo  " <input type=hidden name=index  value='".($_row['d_index'])."'>
        <input type =hidden name=voornaam value='".$_row['d_productNaam']."'>";
                        }
                    echo "

				    <input type=submit name=verwijder class='janee'  value=Verwijder >
      </form>";
                    break;

                case 8: // aanpassen
                    $_SESSION["menu"]=5;
                  
                    echo "<form  method='post' action='aanpassen.php'>

						<input name='index' type='hidden' value='".$_row['d_index']."'>
						<input  name='submit' class='janee' type='submit' value='Pas aan'>
						</form>";
                    break;


                default: // alle andere waarden inclusief 2 (toevoegen)
                    throw new Exception("illegal action");

            }

        }



    }






}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}