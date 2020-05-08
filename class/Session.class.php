<?php

class Session{
    
    private static $_start=false;
    
    
    public static function start(){
        if(self::$_start === false){
            session_start();
            self::$_start = true;
        }
    }
    
    public static function set($_var,$_waarde){
        
        if(count($_waarde) > 1){
            
             for($_i=0;$_i < count($_waarde);$_i++ ){
           
           $_SESSION[$_var[$_i]]=$_waarde[$_i];
       }
            
        }else{
            $_SESSION[$_var]=$_waarde;
        }
      
        
        
    }
    
     public static function get($_var){
        
        return $_SESSION[$_var];
    }
    
    
    public static function  distroy(){
        
      
        if(self::$_start === true){
            session_unset();
            session_destroy();
            
            return true;
        }
    }
    
    
    
      public static function  show(){
        
       echo "<pre>";
          
          print_r($_SESSION);
        echo "</pre>";
    }
    
    
}