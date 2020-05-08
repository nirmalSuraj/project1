<?php

class Redirect{
    
    public static function to($_data){
         
        if($_data){
           header("Location:{$_data}");
            exit();
        }
    }
} 