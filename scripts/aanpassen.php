<?php
try{

    require "../code/initialisatie.inc.php";
    require "../code/session_uitpakken.php";

    $_tpl='home_klant.tpl';
     $_toegang=[6,8];
      if (!isset($_SESSION["actie"]) || !in_array($_SESSION["actie"],$_toegang)){

        throw new Exception("illegal access");
    }
    /*indeze schript gaan alle aanpassingen gebeuren
     als de gegevens via klant bijnnenkomen de menu get als de admin komt 
     dan komt menu waarde via post {$_menu=(isset($_GET['menu'])?$_GET['menu']:$_POST['menu']);}

     user worde opgeslagen in $_SESSION['tabelIndex'] aan de gebruiker kant na aanpassen wordt het terug verwijdert.


   */

    if (!isset($_SESSION["actie"]))  // geen actie gedefinieerd
    {
        throw new Exception("illegal access");
    }
    //$_srv in stellen 
    $_srv="../scripts/klant_data_aanpassen.php";
    /*
   indien $_SESSION index is niet set dat wil zeggen dat waarde komt via de kant van admin met post.
   
     als het niet set copier de waarde van post naar $_SESSION index 
   */

    $_SESSION['index']=( $_SESSION['index'] != null ? $_SESSION['index']:$_POST['index']);
    //als tablegelijk aan view dan geef de table waarde
    $_SESSION['tabelIndex']=($_SESSION['tabelIndex'] != 'v_full_gegevens_users'?$_SESSION['tabelIndex']:'t_users');  

    //in t_authentication is index var ingegeven als (d_user). zodus als table index == t_authentication dan d_user
    $_index=($_SESSION['tabelIndex'] != 't_authentication'?"d_index":"d_user"); 



   /*wij gaan hier gegevens van de $_SESSION['tabelIndex'](table) op halen op basis van $_SESSION['index'](user id ) en  tonen in een form */

    $_query="select * from {$_SESSION['tabelIndex']} where $_index={$_SESSION['index']}";

    $_resul=$_PDO->query("$_query");
    //gegevens bestaan niet dan throw database inconsistentie 
    if($_resul->rowCount() <= 0){
        throw new PDOException("database inconsistentie ");
    }
    //lopen door user id, vergelijke van table $_SESSION['tabelIndex'] elke table heeft een apparte form 
    while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){
   
        if($_SESSION['tabelIndex'] == "t_users" || $_SESSION['tabelIndex']=="v_full_gegevens_users"){
            require("../code/user_gegevens.php");// selectie user_gegevens
        }

        if($_SESSION['tabelIndex'] == "t_bedrijf"){
            require("../code/bedrijf_gegevens.php");// selectie bedrijf_gegevens
        }
        if($_SESSION['tabelIndex'] == "t_authentication"){

            require("../code/nieuw_paswoord.php");// selectie nieuw_paswoord
        }
        
        if($_SESSION['tabelIndex'] == "v_selectproducten" ){
         
            require("../code/producten_update_toevoeg.php");
        }
        
        if($_SESSION['tabelIndex'] == "t_soort" ){
         
           $_inhoud= "
           <fieldset>
   <div class='col-lg-6 col-sm-12  form'>
   <h1>Soort aanpassen</h1>
    <form  method='post' id='form' action='$_srv' >
    <fieldset>
     <label>Soort naam</label>
    <input type='text'  name='naam' value='{$_row['d_soorNaam']}'>
    </fieldset>
    <button class='janee' ><a href='a_admin.php'>Back</a></button>
		<input name='aanpassen' id='submit' type='submit' value='Aanpassen'>

    </form>

     <div>";
        }


    }


/* als jij op deze pagina binnen komt dan word menu waarde mee gestuurd via superglobal get $_get['menu'] of post 
   afhankelijk hoe jij binnenkomt
*/
    $_menu=$_SESSION["menu"];



    require "../code/output.inc.php";
}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}
