<?php
try{

    require "../code/initialisatie.inc.php";
    require "../php_lib/get_val.php";
    require "../php_lib/up_load_img.php";
    require "../code/session_uitpakken.php";


    $_toegang=[9];
    if (!isset($_SESSION["actie"]) || !in_array($_SESSION["actie"],$_toegang)){

        throw new Exception("illegal access");
    }
    /*

    in deze script gaan wij producten toevoegen 

   */
    //toevoegen producten 
    if($_SESSION['tabelIndex'] == "v_selectproducten"){

        //vieuw veranderen naar 	t_producten om aanpassingen te kunnen doen 
        $_SESSION['tabelIndex']="t_producten";
        //afbeelding opladen $_path = locatie afbeelding, $_bool geeft true



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

            "beschrijv"=>["charMax"=>50,
                          "charMin"=>2],
            "prijs"=>[]

        ]);
        if($_valideren->check()){
            //insert("t_users","d_naam,d_email,d_voornaam",)
            $_upload=upload_img($_FILES["img"],["png"],"100000");
            list($_path,$_bool)=explode("-",$_upload);
            /*
            if($_POST['nieuw_soort'] != null){
                insert('t_soort',"d_soorNaam",[$_POST['nieuw_soort']]);
            }
*/
            insert($_SESSION['tabelIndex'],
                   "d_productNaam,
                       d_stock,
                       t_soort_d_index,
                       d_prijs,
                       d_psofkg,
                       t_btw_d_index,
                       d_beschrijving,
                       d_img
                       ",
                   [$_POST['naam'],
                    $_POST['stock'],
                    $_POST['soort'],
                    $_POST['prijs'],
                    $_POST['psofkg'],
                    $_POST['btw'],
                    $_POST['beschrijv'],
                    $_path]);

            $_msg="insert gelukt";
            Redirect::to("a_admin.php?msg='Update gelukt'");

        }else{

            $_error="{$_valideren->errorValidate()}";
            Redirect::to("a_admin.php?error='{$_valideren->errorValidate()}'");
        }


    }
    //toevoegen soort
    if($_SESSION['tabelIndex'] == "t_soort"){
        
            $_valideren=new Validatie();
            $_valideren->validate($_POST,[
                "naam"=>[
                    "charMax"=>45,
                    "charMin"=>2
                ]

            ]);
            if($_valideren->check()){

                  insert($_SESSION['tabelIndex'],
                       "d_SoorNaam
                       ",
                       [$_POST['naam']]);
              

                $_msg="insert gelukt";
                Redirect::to("a_admin.php?msg='Update gelukt'");

            }else{

                $_error="{$_valideren->errorValidate()}";
                Redirect::to("a_admin.php?error='{$_valideren->errorValidate()}'");
            }

    }

}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}
