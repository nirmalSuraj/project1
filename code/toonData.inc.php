<?php


if($_SESSION['tabelIndex'] == "v_full_gegevens_users"){
    $_inhoud.= "

 <tr> <td>
  ". 
        $_row['d_voornaam']." ".
        $_row['d_naam'] ."</td><td>
           <input type='hidden'  value='{$_row['d_index']}'>
           <input type='button' class='toevoegen btnmodal' data-toggle='modal' data-target='#myModal' value='Meer info' ></td><tr>
       
       
        ";
    
}
  

if($_SESSION['tabelIndex'] == "v_selectproducten"){
    $_inhoud.= "

 <tr> <td>
  ". 
        $_row['d_voornaam']." ".
        $_row['d_productNaam']."</td><td>
           <input type='hidden'  value='{$_row['d_index']}'>
           <input type='button' class='toevoegen btnmodal' data-toggle='modal' data-target='#myModal' value='Meer info' ></td><tr>
       
       
        ";
    
}


if($_SESSION['tabelIndex']=="t_soort"){
    if($_SESSION["actie"] == 7){
$_inhoud.= "

 <tr> <td>
  ". $_row['d_soorNaam']."</td><td></tr>
   
       
        ";
    }else{
        $_inhoud.= "

 <tr> <td>
  ". $_row['d_soorNaam']."</td><td>
         <form  method='post' id='form' action='aanpassen.php'>
           <input type='hidden'  name='index' value='{$_row['d_index']}'>
           <input type='submit' class='toevoegen btnmodal'  value='Aanpssen' ></td><tr>
       </form>
       
        ";
    }
}
