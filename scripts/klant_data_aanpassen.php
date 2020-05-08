<?php
try{
    require("../code/initialisatie.inc.php");
    require "../php_lib/get_val.php";
    require "../php_lib/up_load_img.php";
    require "../code/session_uitpakken.php";
    /*
    indeze funtie gaan gegevens van de gebruikers aanpassen, vrwijderen

    */

    $_tpl='profiel.tpl';
    $_toegang=[6,8];
    $_error="";
    $_msg="";
    /*om hier te binnen moegen moet langs éé van volgende wegen binnen komen 
    -select
    */ 

    if (!isset($_SESSION["actie"]) || !in_array($_SESSION["actie"],$_toegang)){

        throw new Exception("illegal access");
    }

    if(isset($_POST['aanpassen'])){
        require("../code/inputUitpakken.inc.php");
        //deze is omgekeerde van  pk_t_gemeente
        require("../php_lib/from_index_to_table.php");


        //valderen gegevens van t_users table
        if($_SESSION['tabelIndex'] == "t_users"){
            //deze is omgekeerde van  pk_t_gemeente

            $_pk=PK_t_gemeente($_postcode, $_gemeenteNaam);
            $_gender_s=($_POST['gender'] == 0 ?'old_gen':'gender');
            $_aanspreek_s=($_POST['aanpreek'] == 0 ?'old_aans':'aanpreek');

            //aanmaken van new validatie object
            //aanmaken van new validatie object
            $_valideren=new Validatie();
            $_valideren->validate($_POST,[

                "$_aanspreek_s"=>[],
                "naam"=>[
                    "charMax"=>45,
                    "charMin"=>2  
                ],
                "voornaam"=>[
                    "charMax"=>45,
                    "charMin"=>2 
                ],
                "$_gender_s"=>[],
                "straat"=>[
                    "charMax"=>50,
                    "charMin"=>4  
                ],
                "postcode"=>[],
                "gemeente"=>[],
                "tel"=>[
                    "charMax"=>10,
                    "charMin"=>10
                ],
                "mail"=>[
                    "ad"=>"@"
                ],
                "nr"=>[],
                "geboortedatum"=>[]
            ]);
            if($_valideren->check()){

                $_gender = ($_POST['gender'] == 0 ?get_val_data("d_sex_index","v_full_gegevens_users","d_index",$_SESSION['index']):$_POST['gender']);
                $_aanpreek = ($_POST['aanpreek'] == 0 ?get_val_data("d_aanspreekindx","v_full_gegevens_users","d_index",$_SESSION['index']):$_POST['aanpreek']);

                update($_SESSION['tabelIndex'],
                       "d_naam='$_naam',
                   d_email='$_mail',
                   d_geboortedatum='$_geboortedatum',
                   d_voornaam='$_voornaam',
                   d_straat='$_straat',
                   d_huisNummer='$_nr',
                   d_telefoonnummer='$_telefoon',
                   t_gender_d_index='$_gender',
                   t_adres_d_index=$_pk,
                   t_aanspreekTitel_d_index='$_aanpreek'  "
                       ,["d_index","=",$_SESSION['index']]);

                $_msg="Update gelukt";
                //Redirect::to("klant_profiel.php?msg='Update gelukt'");

            }else{
                $_error="{$_valideren->errorValidate()}";
                //Redirect::to("klant_profiel.php?error='{$_valideren->errorValidate()}'");
            }


        }


        //valideren table bedrijf
        if($_SESSION['tabelIndex'] == "t_bedrijf"){
            //deze is omgekeerde van  pk_t_gemeente
            $_pk=from_index_to_table($_postcode, $_gemeenteNaam);

            require'../code/bedrijf_validatie.php';
            if($_valideren->check()){

                update($_SESSION['tabelIndex'],

                       "d_naam='$_bedrijf',
                       d_btw='$_btw',
                       d_straat='$_straat',
                       d_telefoonnummer='$_telefoon',
                       d_huisNummer='$_nr',
                       t_gemeente_d_index=$_pk"
                       ,["d_index","=",$_SESSION['index']]);

                $_msg="Update gelukt";
                //Redirect::to("klant_profiel.php?msg='Update gelukt'");

            }else{
                $_error="{$_valideren->errorValidate()}";
                //Redirect::to("klant_profiel.php?error='{$_valideren->errorValidate()}'");
            }


        }

        //paswoord updaten    
        if($_SESSION['tabelIndex'] == "t_authentication"){

            $_query="select d_logon from {$_SESSION['tabelIndex']} where d_user ={$_SESSION['index']}";
            $_resul=$_PDO->query("$_query");
            if($_resul->rowCount() == 0){

            }else{
                while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){

                    $_logon=$_row['d_logon'];
                }
            }


            $_valideren=new Validatie();
            $_valideren->validate($_POST,[
                "paswoord"=>[
                    "hoofdletter"=>1,
                    "nummers"=>1,
                    "charMin"=>8


                ],
                "her_paswoord"=>[
                    "vergelijk"=>"paswoord"
                ]
            ]);

            if($_valideren->check()){

                $_paswoord=encrypt($_logon, $_paswoord);

                update($_SESSION['tabelIndex'],
                       "d_paswoord='$_paswoord'",
                       ["d_user","=",$_SESSION['index']]);

                $_msg="Update gelukt";
                //Redirect::to("klant_profiel.php?msg='Update gelukt'");

            }else{
                $_error="{$_valideren->errorValidate()}";
                //Redirect::to("klant_profiel.php?error='{$_valideren->errorValidate()}'");
            }


        }


        //updaten producten
        if($_SESSION['tabelIndex'] == "v_selectproducten"){
            //vieuw veranderen naar 	t_producten om aanpassingen te kunnen doen 
            $_SESSION['tabelIndex']="t_producten";
            //afbeelding opladen $_path = locatie afbeelding, $_bool geeft true
            list($_path,$_bool)=explode("-",upload_img($_FILES["img"],["png"],"100000"));


           //old index van soort 
            $_old=get_val_data("t_soort_d_index","v_selectproducten","d_index",$_SESSION['index']);
            //btw index ophalen (deze gaat voor een probleem zorgen )
            $_btw=get_val_data("d_btxind","v_selectproducten","d_index",$_SESSION['index']);
            //als nieuw soort is geblijk aan 1 dan post soort wordt overgeschreven met $_old 
            $_POST['soort']=($_POST['soort'] == 1?$_old:$_POST['soort']);

            $_valideren=new Validatie();
            $_valideren->validate($_POST,[
                "naam"=>[
                    "charMax"=>45,
                    "charMin"=>2
                ],
                "psofkg"=>[
                    "charMax"=>2,
                    "charMin"=>2
                ],
                "btw"=>[

                    "ad"=>"%"
                ],

                "beschrijv"=>["charMax"=>50,
                              "charMin"=>2],
                "prijs"=>[]

            ]);
            if($_valideren->check()){

                update($_SESSION['tabelIndex'],
                       "d_productNaam='$_naam',
                       d_stock='{$_POST['stock']}',
                       t_soort_d_index={$_POST['soort']},
                       d_prijs={$_POST['prijs']},
                       d_psofkg='{$_POST['psofkg']}',
                       t_btw_d_index='{$_btw}',
                       d_beschrijving='{$_POST['beschrijv']}'
                       ",
                       ["d_index","=",$_SESSION['index']]);
               //als bool true is dan afbeelding opslaan
                if($_bool){
                    update($_SESSION['tabelIndex'],"d_img='{$_path}'",["d_index","=",$_SESSION['index']]);
                }

                $_msg="Update gelukt";
                //Redirect::to("klant_profiel.php?msg='Update gelukt'");

            }else{

                $_error="{$_valideren->errorValidate()}";
                //Redirect::to("klant_profiel.php?error='{$_valideren->errorValidate()}'");
            }


        }


        if($_SESSION["actie"] != 8){

            unset($_SESSION['index']);
            Redirect::to("klant_profiel.php?".($_error!= ""?'error':'msg')."=".($_error != ""?$_error:$_msg)."");

        }else{
            unset($_SESSION['index']);

            Redirect::to("a_admin.php?".($_error!= ""?'error':'msg')."=".($_error != ""?$_error:$_msg)."");
        }

    }



}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}