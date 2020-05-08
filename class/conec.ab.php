<?php

abstract class Conec{
    private $_server="localhost";
    private $_db="db_horeca";
    private $_servernaam="root";
    private $_password="";
    
   
    
   protected function pdo(){
       
    $_pdo= new PDO("mysql:host={$this->_server};dbname={$this->_db}", $this->_servernaam, $this->_password);
       
     $_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       return $_pdo;
       
    }
    

    
    
}