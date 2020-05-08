<?php
  $_inhoud.= "

 <tr> <td>
  ". 
        $_row['d_voornaam']." ".
        ( $_SESSION['tabelIndex']!="v_selectproducten"?$_row['d_naam']:$_row['d_productNaam']) ."</td><td>
           <input type='hidden'  value='{$_row['d_index']}'>
           <input type='button' class='toevoegen btnmodal' data-toggle='modal' data-target='#myModal' value='Meer info' ></td><tr>
       
       
        ";

