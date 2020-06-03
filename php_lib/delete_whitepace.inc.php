<?php

function delete_whitepace(){
    foreach($_POST as $_name=>$_val){
             
        if($_name != "postcode" || $_name != "gemeente" ){
        
          $_POST[$_name]=str_replace(" ","",$_val);
         
        }
    }
    
}