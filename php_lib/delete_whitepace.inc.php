<?php

function delete_whitepace(){
    foreach($_POST as $_var=>$_values){
    
        $_POST[$_var]=str_replace(" ","",$_values);
    }
    
}