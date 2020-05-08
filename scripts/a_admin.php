<?php
try{
    require("../code/initialisatie.inc.php");

    require "../code/session_uitpakken.php";
    /*indeze script gaan wij keuze moeten maken welke admin moet er uitgevoerd worden*/
    $_tpl='home_klant.tpl';
    $_inhoud=$_inhoud.=Inlezen("text_admin_invoering.html");
    $_SESSION['tabelIndex']="";

    //is form gezet? indien ja toon welke keuze dat er gemaakt werd
    if(isset($_POST['mnc'])){
        $_query="select d_mnemonic,d_table from t_mnemonic where d_index= {$_POST['mnc']}";

        $_resul=$_PDO->query("$_query");

        if($_resul->rowCount() != 0){


            while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){
                //keuze
                $_gekozen=$_row['d_mnemonic'];
                //derze session gaan wij straks gebruiken voor gegevens te verwerken
                $_SESSION['tabelIndex']=$_row['d_table'];
            }


        }

    }

    /*(isset($_gekozen)?"<p>u kan '{$_gekozen}' bewerken</p>":"") deze is ternary operetor 
die gaat gekijken of er $_gekozen var al een data heeft indien niet dan wordt getoont dat er nog geen keuze is gemaakt!
*/

    $_inhoud.=(isset($_gekozen)?"<p>u kan '{$_gekozen}' bewerken</p>":"<p>U hebt voorlopig niets gekozen</p>")."

   <form id='rbForm' method='post'  action='$_srv' >

   ".

        radioButton("mnc", "t_mnemonic", "d_index","d_mnemonic" , $_start = 0, $_select = 0, $_extra ="
   onclick=document.getElementById('rbForm').submit()
   ")."</form>";

    $_menu=5;



    require "../code/output.inc.php";
}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}