<?php

$_inhoud.=" 
                <div class='col-lg-6 col-sm-12 form'>
                    <form action='$_srv' method='post'>
                       <h1>Registeren</h1>
                     

                        <label for='bedrijf'>Bedrijf</label>
                        <input type='text' id='bedrijf' name='bedrijf'  value='{$_POST['bedrijf']}'>
                        <label for='btw'>Ondernemingsnr</label>
                        <input type='text' id='btw' name='btw' value='{$_POST['btw']}'>
                         <label for='straat'>Straat</label>
                        <input type='text' id='straat' name='straat' value='{$_POST['straat']}'>
                        <label for='huisnummer'>Nr</label>
                        <input type='text' id='nr' name='nr' value='{$_POST['nr']}' size='10'>
                        <label >Postcode</label>";
$_inhoud.= dropDown("postcode","t_gemeente","d_postcode","d_postcode",$_start=0);
$_inhoud.=  "<label >Gemeente</label>
                       ".dropDown("gemeente","t_gemeente","d_gemeentenaam","d_gemeentenaam",$_start=0)."
                         <label >telefoon</label>
                       <input type='text' name='tel' size='10' value='{$_POST['tel']}'  placeholder='03/....'>
                       <input type='submit' id='registeren' name=bedrijf_regis value='Registeren' >



                    </form>

                </div>";


