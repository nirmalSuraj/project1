<?php

class Variabe{
    
    public static function type($_data,$_naam){
        
        //strip_tags("Hello <b>world!</b>");
        
        foreach($_data as $_var=>$_value){
            
            $_waarde=htmlspecialchars(trim(stripslashes(strip_tags($_value))));
            
             $_data[$_var]=$_waarde;
            
            return $_data[$_naam];
        }
         
       
        
    }
}