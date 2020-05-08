<?php

$_inhoud.=" 
                <div class='col-lg-6 col-sm-12 form'>
                    <form action='$_srv' method='post'>
                       <h1>Aanpassen</h1>
                       

                        <label for='bedrijf'>Bedrijf</label>
                        <input type='text' id='bedrijf' name='bedrijf'  value='{$_row['d_naam']}'>
                        <label for='btw'>BTW</label>
                        <input type='text' id='btw' name='btw' value='{$_row['d_btw']}'>
                         <label for='straat'>Straat</label>
                        <input type='text' id='straat' name='straat' value='{$_row['d_straat']}'>
                        <label for='huisnummer'>Gebouwnummer</label>
                        <input type='text' id='nr' name='nr' value='{$_row['d_huisNummer']}' size='10'>
                        <label >Postcode</label>";
$_inhoud.= dropDown("postcode","t_gemeente","d_index","d_postcode",$_start=$_row['t_gemeente_d_index']);
$_inhoud.=  "<label >Gemeente</label>
                       ".dropDown("gemeente","t_gemeente","d_index","d_gemeentenaam",$_start=$_row['t_gemeente_d_index'])."
                         <label >telefoon</label>
                       <input type='text' name='tel' size='10' value='{$_row['d_telefoonnummer']}'  placeholder='03/....'>
                       <input type='submit' id='registeren' name=aanpassen value='Aanpassen' >



                    </form>

                </div>";


