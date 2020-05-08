<?php

echo "
<div class='col-md-3 col-sm-12 producten '>

<div>
    <img src='{$_row['d_img']}' alt='' >
    <label> {$_row['d_productNaam']}  </label>
    <label><strong>prijs:</strong> {$_row['d_prijs']} € per {$_row['d_psofkg']}</label>
     <label><strong>btw:</strong> {$_row['d_btw']}</label>
     <label><strong>stock:</strong>".($_row['d_stock']==0?"Niet beschikbaar":$_row['d_stock']) ."</label>
     <input type='hidden' value='{$_row['d_index']}'>
     
    <input type='button' class='toevoegen' data-list='rigth' value='toevoegen'>
    
    <button class='regeling' data-list='rigth' >- </button>
    <input type='hidden' class='aantal' value='' data-list='rigth' name='aantal' value='' placeholder='Aantal'>
    <button class='regeling' data-list='rigth' >+ </button>
     <input type='hidden' class='verwijderen' data-list='rigth' value='x'>
    
</div>
<hr>

</div>


";
