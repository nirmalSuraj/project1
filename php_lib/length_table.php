<?php

function lenth_table($_table,$_naam){
    global $_PDO;
 
    $_query="select count({$_naam}) as d_index from {$_table} ";
    $_resul=$_PDO->query("$_query");
 if($_resul->rowCount() != 0){
    
     while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){
         return $_row['d_index'];
     }
 }    
}