<?php
$_inhoud.="<div class='col-md-12 col-sm-12 producten '>
<h2> Uw kasticket/factuur</h2>
       <table>";


$_query="select * from v_full_gegevens_bedrijf	 where d_user = $_user";
$_resul1=$_PDO->query($_query);
if($_resul1->rowCount() > 0 ){
    while($_row=$_resul1->fetch(PDO::FETCH_ASSOC)){
        $_inhoud.="<th colspan='6' >
        Bedrijf:{$_row['d_naam']}<br>
        Straat:{$_row['d_straat']}<br>
        nr:{$_row['d_huisNummer']}<br>
        Gemeente:{$_row['d_gemeentenaam']} {$_row['d_postcode']}<br>
         Tel:{$_row['d_telefoonnummer']}<br>
         </th>";
    }

}else{
    Redirect::to("profiel.php");
    throw new Exception("illegal access");
}

$_inhoud.="
 <form method='post' id='form'  action='$_srv'>
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



 <input type='hidden' name='factuurnmmer' value='' id='factuurnmmer' >
<input type='submit' value='Verder gaan' id='makeFatuurN' name='verder' class='janee' >

 </form>
</div>
  ";