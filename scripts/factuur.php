<?php
try{
    require("../code/initialisatie.inc.php");

    require "../code/session_uitpakken.php";
    $_tpl='shoppen_klant.tpl';
    //om te kunnen shoppen  moet de gebruiker via de juiste weg komen!!
    $_toegang=[2,7];

    /*om hier te binnen moegen moet langs éé van volgende wegen binnen komen 
    -select
    */

    if (!isset($_SESSION["actie"]) || !in_array($_SESSION["actie"],$_toegang)){

        throw new Exception("illegal access");
     

    }
       /*wij gaan in deze script facturen van de gebuikers toonen.
    in aller eerste instantie gaat de gebruiker moet keuze maken, 
    welke factuur dat hij wil bekijken.

    ook de admin kan gaat kan gebruik maken van deze script.
    */
    
    /*
    via de admin kant komt klant id via $_SESSION['index'] en via de kant van de klant is id al opgeslagen in var $_user.
    
    $_SESSION['admin']== true indeze situatie wordt deze script opgeroepen via de kant van admin.
    
    
    */ 

    $_user=($_SESSION['index']!=null?$_SESSION['index']:$_user);

    
    ///alle facturnummers en datum toonen  als toon_fac niet set is 

    if(!isset($_GET['toon_fac'])){

        $_inhoud.="<div class='col-md-12 col-sm-12 producten '>
            <h1>U facturen</h1>";

        $_query ="select * from t_factuur where t_users_d_index={$_user}";
        $_resul = $_PDO->query("$_query");

        if($_resul->rowCount() > 0){


            $_inhoud.="<table>

  <tr>
  <th>Factuur</th>
  <th>Datum</th>
  </tr>
 ";

            while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){


                if($_prev != $_row['d_factuurnummer']){
                    $_inhoud.="<tr>
                    <td>

                      <a href='$_srv?toon_fac={$_row['d_factuurnummer']} '>{$_row['d_factuurnummer']} </a>

                    </td>
                    <td>
                    {$_row['d_datum']}
                    </td>
                </tr>";

                }

                $_prev=$_row['d_factuurnummer'];

            }
            $_inhoud.="</table>

            </div>";



            //als er geen facturen zijn terug naar homepagina,met msg dat er geen facturen zijn 
        }else{
            if($_SESSION['tabelIndex'] == "t_factuur"){
                Redirect::to("a_admin.php?error=Geen factuur gevonden");
            }else{
                Redirect::to("home_klant.php?error=Geen factuur gevonden");
            }

        }

    }else{
        //als toon_fac geset is


        $_query="select * from t_factuur where d_factuurnummer = '{$_GET['toon_fac']}' 
        and t_users_d_index={$_user}";

        $_resul=$_PDO->query("$_query");


        if($_resul->rowCount() > 0 ){

            $_inhoud.="<div class='col-md-12 col-sm-12 producten '>
<h2> Uw kasticket/factuur</h2>
       <table >";


            $_query="select * from v_full_gegevens_bedrijf	 where d_user = {$_user}";
            $_resul1=$_PDO->query($_query);
            if($_resul1->rowCount() > 0 ){
                while($_row=$_resul1->fetch(PDO::FETCH_ASSOC)){
                    $_inhoud.="<th colspan='6' >
        Bedrijf:{$_row['d_naam']}<br>
        Btw:{$_row['d_btw']}<br>
        Straat:{$_row['d_straat']}<br>
        nr:{$_row['d_huisNummer']}<br>
        Gemeente:{$_row['d_gemeentenaam']} {$_row['d_postcode']}<br>
         Tel:{$_row['d_telefoonnummer']}<br>
         Factuurn: {$_GET['toon_fac']}
         </th>";
                }

            }else{
                Redirect::to("profiel.php");
            }

            $_inhoud.="

<tr>
    <th>Artikelnummer</th>
    <th>Product</th>
    <th>Prijs</th>
    <th>BTW</th>
    <th>Aantal</th>
    <th>Subtotaal</th>
  </tr>";
            while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){
                $_subtotaal=$_row['d_prijs']*$_row['d_aantal'];
                $_kgofps=($_row['d_psofkg']=="kg"?"kg":"ps");
                $_inhoud.="

             <tr>
    <td>{$_row['d_index']}</td>
    <td>{$_row['d_productNaam']}</td>
    <td>{$_row['d_prijs']} € ".$_kgofps."</td>
    <td>{$_row['d_btw']}</td>
    <td>{$_row['d_aantal']}</td>
    <td>{$_subtotaal} €</td>
  </tr>

  ";

                $_totaal+=$_subtotaal;

            }


            $_inhoud.="  <tr>
    <td colspan='5'>Totaal</td>


    <td>{$_totaal} €</td>
  </tr></table>
<input type='button' value='print' id='print' class='janee'>
</div>
  ";

        }





    }

    if($_SESSION['menu'] != ""){

        $_menu=$_SESSION['menu'];
    }else{
        $_menu=3; 
    }




    require "../code/output.inc.php";
}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}