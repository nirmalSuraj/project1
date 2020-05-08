<?php
try{

    //initialiseren 
    require "../code/initialisatie.inc.php";


    //pagina die wij gaan tonen aan klant
    $_tpl="home.tpl";

    //als er geregisteerd word dan krijgt de user gelijk rol van een klant
    $_rol=1;


    //valideren bij submit(registeren);
    if(isset($_POST['registeren'])){

        require "../code/inputUitpakken.inc.php";



        //regels voor elke var die binnen komt bepalen
        require "../code/validatie.inc.php";

        //als alles is juist in gegeven 
        if($_valideren->check()){


            $_query=createSelect("t_users", 
                                 ["$_naam","$_mail","$_geboortedatum","$_voornaam","$_straat","$_nr","$_telefoon",date("Y-m-d"),"$_gender","$_pk","$_aanpreek","$_rol"], 
                                 ["d_naam","d_email","d_geboortedatum","d_voornaam","d_straat","d_huisNummer","d_telefoonnummer","d_datum","t_gender_d_index","t_adres_d_index","t_aanspreekTitel_d_index","t_rol_d_index"]);


            $_resul=$_PDO -> query("$_query");
            //als deze persoon niet bestaat registeren

            if($_resul->rowCount() == 0){

                $_query="insert into t_users (d_naam,
                d_email,
                d_geboortedatum,
                d_voornaam,
                d_straat,
                d_huisNummer,
                d_telefoonnummer
                ,d_datum,
                t_gender_d_index,
                t_adres_d_index,
                t_aanspreekTitel_d_index,
                t_rol_d_index)
                 value(?,?,?,?,?,?,?,?,?,?,?,?)";


                $_query=$_PDO->prepare("$_query"); 

                $_query->execute(["$_naam",
                                  "$_mail",
                                  "$_geboortedatum",
                                  "$_voornaam",
                                  "$_straat",
                                  "$_nr",
                                  "$_telefoon",
                                  date("Y-m-d"),
                                  "$_gender",
                                  "$_pk",
                                  "$_aanpreek",
                                  "$_rol"]);

                //als usergegevens zijn geregistreerd dan de laatste index id ophalen
                $_lastId= $_PDO->lastInsertId();

                /*LastId word de index waarde van authentication
                  waar zijn inlog gevens worden opgeslagen. 
                */ 


             
                //encrypten van paswoord
                $_paswoord=encrypt($_mail, $_paswoord);

                $_query="insert into t_authentication (d_user,d_logon,d_paswoord,d_identifier,d_token,d_expire,d_faultcntr,	d_timeOut,d_resetKey,d_resetTime,d_rol) value(?,?,?,?,?,?,?,?,?,?,?)";
                $_query=$_PDO->prepare("$_query"); 
                $_query->execute(["$_lastId",
                                  "$_mail",
                                  "$_paswoord",
                                  "",
                                  "",
                                  "",
                                  "",
                                  "",
                                  "",
                                  "",
                                  "$_rol"]); 



                //als geregistreerd is dan naar login pagina
                Redirect::to('bedrijf_regis.php');


            }else{
                //anders melding in error.csv
                $_error.= "Deze persoon {$_naam} bestaat al!";
            }

        }else{
            //als er errors zijn bij valideren dan worden errors in var $_error opgeslagen en getoot bovenop form

            $_error.= $_valideren->errorValidate();
        }


    }

    //  selectie from ophalen
   
    require("../code/selectionForm.inc.php");





    $_menu=1;
    // output voor html
    require("../code/output.inc.php");   


}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}

