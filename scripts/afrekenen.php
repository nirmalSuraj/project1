<?php
try{
    require("../code/initialisatie.inc.php");

    require "../code/session_uitpakken.php";
    /*in indeze schrips wordt definitief betaald, hie kan niets verwijdert of aangepast worden.
    Boven doen gebuiker kan hier enkel terecht als hij producten in lijst heeft staan 

    */
    //om te kunnen shoppen  moet de gebruiker via de juiste weg komen!!
    $_tpl='shoppen_klant.tpl';
    $_toegang=[5];
    //als de producten in stock dan opslaan in arry 
    $_sql=[];
    $_index=[];
    /*om hier te binnen moegen moet langs éé van volgende wegen binnen komen 
    -select
    */
    //om te kunnen shoppen  moet de gebruiker via de juiste weg komen!!
    if (!isset($_SESSION["actie"]) || !in_array($_SESSION["actie"],$_toegang)){

        throw new Exception("illegal access");
    }


    if(!isset($_POST['verder'])){

        $_query="select * from v_bijwerken where d_id = $_user";
        $_resul=$_PDO->query("$_query");

        if($_resul->rowCount() > 0 ){

            require "../code/kasticket.php";


        }else{

            Redirect::to("shoppen.php?error=U heeft geen prodcuten gekozen");

        }


    }else{
        //make factuur nummer
        include "../php_lib/get_val.php";
        $_factuurnummer = "fk";
         
        $_count= get_val_data("d_count_holder","t_factuur","t_users_d_index",$_user);
       
        if( $_count == null){
            $_factuurnummer .= date("d-m-Y");
            $_factuurnummer .="-0";
            $_count=0;
           
        }else{
            $_count++;
            $_factuurnummer .= date("d-m-Y")."-".$_count;
        }
       
        //uniek factuur id maken 
        
        //geselecteerde producten toeven in factuur

        $_query="select * from v_bijwerken where d_id = $_user";
        $_resul=$_PDO->query("$_query");
  
        if($_resul->rowCount() > 0 ){

            while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){

                insert("t_factuur","t_users_d_index,d_productNaam,d_datum,d_btw,d_artieknummer,d_aantal,d_psofkg,d_prijs,d_factuurnummer,d_count_holder",
                       [$_user,$_row['d_productNaam'],date("Y-m-d"),$_row['d_btw'],$_row['d_index'],$_row['d_aantal'],
                        $_row['d_psofkg'],$_row['d_prijs'],$_factuurnummer,$_count]);

                //na aanmaken van factuur gaan  wij stock in t_producten aanpassen
                $_query_pro="select * from t_producten where d_index = {$_row['d_index']}";
                
                $_resul_pro=$_PDO->query("$_query_pro");
                
                $_id=$_row['d_index'];
                
                if($_resul_pro->rowCount() > 0){

                    while($_row_pro=$_resul_pro->fetch(PDO::FETCH_ASSOC)){

                        $_stock= $_row_pro['d_stock']-$_row['d_aantal'];
                        
                        if($_row_pro['d_stock'] !=0){
                            
                            $_sql[]=$_stock;
                            
                            $_index[]=$_row['d_index'];
                            
                        }else{
                            /*indien  deze product op is gelijk verwijderen en terug naar de shoppen.php gaan zo dat gebruiker 
                              een andere keuze kan maken.
                            */
                            delete("t_list",["d_index","=",$_user,"and","t_producten_d_index","=",$_id]);
                            
                            Redirect::to("shoppen.php?error=Helaas deze( {$_row_pro['d_productNaam']} ) product hebben wij niet stock");
                        }

                        
                    }
                    
                    foreach($_sql as $_key=>$_waarde){
                        update("t_producten","d_stock='{$_sql[$_key]}'",["d_index","=",$_index[$_key]]);
                    }
                    

                }






            }

            // na toevoegen alle producten uit t_list verwijdere

            delete("t_list",["d_index","=",$_user]);
            //logon dat de gebruiker inkopen heeft gedaan

            logSecurityInfo($_logon,"betaald");
            //hier redirect naar shopping pagina
            Redirect::to("shoppen.php?msg=betaald");

        }



    }
    $_menu=3;



    require "../code/output.inc.php";
}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}