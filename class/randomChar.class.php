<?php

class randomChar{
    private static $_alfa=["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p"];
    
    public static function char(){
        
        $_randomlen=rand(0,count(self::$_alfa));
        $_random=rand(0,count(self::$_alfa));
        return self::$_alfa[$_random].$_randomlen;
        
    }
}