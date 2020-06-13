<?php
try{
    require("../code/initialisatie.inc.php");

    require "../code/session_uitpakken.php";

    $_data_exists=false;
    $_error_type=["Datum: ","Error: ","Locatie: ","Line: "];



    $_tpl='home_klant.tpl';


    $_inhoud="

    <div class='col-lg-6 col-sm-12 regisform form' >
     <h1>Kies een datum</h2>
    <form id='form' action='$_srv' method='post'>
 <label> Van </label>
  <input type='date' name='van' value='Submit'>
   <label> Tot </label>
  <input type='date' name='tot' value='Submit'>
  <input type='submit' name='zoeken' value='Zoeken '>

</form>

</div>

";
    

//gevraagde errors tonen
    if(isset($_POST['zoeken'])){
        //check of dat deze file bestaat
        if(file_exists("../error/error.csv")){
            //van en tot datums leeg zijn dan redirect naar error pagina met melding "maak een keuze" 
            if(empty($_POST['van']) && empty($_POST['tot'])){

                Redirect::to("$_srv?error=maak een keuze");

            }else{
                //datum dat binnen komt rangschikken van dag naar jaar
                list($_y,$_m,$_d)=explode("-",$_POST['van']);

                $_POST['van']="$_d-$_m-$_y";

                list($_y,$_m,$_d)=explode("-",$_POST['tot']);

                $_POST['tot']="$_d-$_m-$_y";

                //csv file open
                $_file = fopen("../error/error.csv","r");

                $_inhoud.="<div class='col-lg-6 col-sm-12 regisform form' id='errorfile' >";
                //lopen tot einde van de file
                while(!feof($_file)){
                  //enkel datum eruithalen  om vergelijking te maken
                    list($_date)=explode(" ",fgetcsv($_file)[0]);
                  
                      //vergelijk ingeven datum 
                    if($_date === $_POST['van'] || $_date === $_POST['tot']){
                        
                        foreach(fgetcsv($_file) as $_i=>$_values){
                            $_inhoud.= $_error_type[$_i].$_values."<br>";
                            //als bestaat dan $_data_exists is true
                            $_data_exists=true;
                            
                        }
                        $_inhoud.='<br>';   
                    }
                }

                $_inhoud.="</div>";
                fclose($_file);
                 
                if(!$_data_exists){
                    Redirect::to("$_srv?error=geen error");
                }
            }
        }else{
            Redirect::to("$_srv?error=error file bestaat niet");
        }
    }  

    //download
    if(isset($_GET["dwn"]) && $_GET["dwn"]=="go"){

        require "../php_lib/download.php";
        //download functie
        download($_srv,"../error/error.csv");
    }

    //reset errors
    if(isset($_GET['reset']) && $_GET['reset'] == "go"){
        
        if(file_exists("../error/test.csv")){
            $_file = fopen("../error/test.csv","w");


            fputcsv($_file, "");

            fclose($_file);

    Redirect::to("$_srv?msg=Gelukt");
    
        }else{
            Redirect::to("$_srv?error=File bestaat niet Neem contact op met ontwikkelaar");

        }

    }



    $_menu=6;



    require "../code/output.inc.php";
}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}