<?php
try{

    require "../code/initialisatie.inc.php";
    require "../code/session_uitpakken.php";

    $_tpl='home_klant.tpl';

    // om verder te gaan moet de gebruiker gegvens van zijn bedrijf invullen..

    //controleren of dat zijn gegevens zijn ingevud
    $_query="select * from t_bedrijf where t_users_d_index={$_user}";
    $_resul=$_PDO->query("$_query");
    //indien niet ga naar registratie formulier
    if($_resul->rowCount() == 0){

        Redirect::to("bedrijf_regis.php");

    }else{

    }

 $_inhoud.=Inlezen("welkome_text_homepagina.html");
 $_inhoud.=Inlezen("img_klant_home.html");
    
    

    $_menu=3;



    require "../code/output.inc.php";

}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}
