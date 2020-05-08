<?php

/*via deze functie kan gevraagde waarde getoont worden 
 jij geeft van waar table
 jij geeft welke waarde collum
*/


function get_val_data($_waarde,$_table,$_col,$_index){
    global $_PDO; 
    
    $_query="select $_waarde from $_table where $_col=$_index";

    $_resul=$_PDO->query("$_query");
    //gegevens bestaan niet dan throw database inconsistentie 
    if($_resul->rowCount() <= 0){
        throw new PDOException("database inconsistentie ");
    }
   
    while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){
   
       return $_row[$_waarde];

    }
    
}
