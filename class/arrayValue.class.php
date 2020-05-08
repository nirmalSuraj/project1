<?php

class ArrayValue{
    private static $_value;
   
    public static function set($_waarde){
        
        for($_i=0;$_i < count($_waarde); $_i++){
             
            if($_i < (count($_waarde)-1)){
               self::$_value.=$_waarde[$_i].',' ; 
            }else{
                self::$_value.=$_waarde[$_i];
            }
            
            
        }
        return self::$_value;
    }
}