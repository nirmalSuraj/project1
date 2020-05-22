<?php
/*
  op basis van welke table dat wij binnen krijgen, gaan wij soort data tonen.
  aangezien dat in bepaalde tables kolommen anders genoemd zijn moet wij if gebruiken om bij juiste table juiste 
  kolom te plaatsen/tonen.
*/

if( $_create_table  == "v_full_gegevens_users"){
    $_inhoud.= "


 <tr class='tr_td'> <td class='tr_td'>
  ". 
        $_row['d_voornaam']." ".
        $_row['d_naam'] ."</td><td class='td-btn'>
           <input type='hidden'  value='{$_row['d_index']}'>
           <input type='button' class='toevoegen btnmodal' data-toggle='modal' data-target='#myModal' value='Meer info' ></td><tr>


        ";

}


if( $_create_table == "v_selectproducten"  ){
    
    
        $_inhoud.= "

 <tr class='tr_td'> <td class='tr_td'>
  ". 
        $_row['d_voornaam']." ".
        $_row['d_productNaam']."</td><td class='td-btn'>
           <input type='hidden'  value='{$_row['d_index']}'>
           <input type='button' class='toevoegen btnmodal btn-list' data-toggle='modal' data-target='#myModal' value='Meer info' ></td><tr>


        ";
    

}


if($_create_table=="t_soort" && $_row["d_soorNaam"] != "Alle Producten"){
    if($_SESSION["actie"] == 7){
        $_inhoud.= "

 <tr> <td>
  ". $_row['d_soorNaam']."</td><td></tr>


        ";
    }else if($_SESSION["actie"] == 8){
        $_inhoud.= "

 
 <tr class='tr_td'> <td class='tr_td'>
  ". $_row['d_soorNaam']."</td><td class='td-btn'>
         <form  method='post' id='form' action='aanpassen.php'>
           <input type='hidden'  name='index' value='{$_row['d_index']}'>
           <input type='submit' class='toevoegen btnmodal'  value='Aanpssen' ></td><tr>
       </form>

        ";
    }else{
        $_inhoud.= "


 <tr class='tr_td'> <td class='tr_td'>
  ". $_row['d_soorNaam']."</td><td class='td-btn'>
         <form  method='post' id='form' action='verwijderen.php'>
           <input type='hidden'  name='index' value='{$_row['d_index']}'>
           <input type='submit' class='toevoegen btnmodal'  name='verwijder' value='verwijderen' ></td><tr>
       </form>

        ";
    }
}
