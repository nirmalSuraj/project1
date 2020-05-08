<?php

class Db extends Conec{

    private static $_pdo;
   





    public static function getData($_table,$_colum){

        self ::$_pdo=new Db();

        $_sqlOpe=["<",">","=","and","like","LIKE","AND","or","OR","<>"];

        $_smt;


        $_row=[];
        if(!empty($_colum)){
              for($_i=0;$_i < count($_colum);$_i++){


            $_row[0]=$_colum[0];


            if(in_array($_colum[1],$_sqlOpe)){

                $_row[1]=$_colum[1]; 
            }

            $_row[2]=$_colum[2];

            if(count($_colum) > 3){

                if(in_array($_colum[3], $_sqlOpe)){
                    $_row[3]=$_colum[3];
                }
                $_row[4]=$_colum[4];

                if(in_array($_colum[5], $_sqlOpe)){
                    $_row[5]=$_colum[5];
                }

                $_row[6]=$_colum[6];
            }

            if(count($_colum) > 3){

                //echo "SELECT * FROM {$_table} WHERE $_row[0] $_row[1] ? $_row[3] $_row[4] $_row[5] $_row[6]";
                $_sql="SELECT * FROM {$_table} WHERE $_row[0] $_row[1] ? $_row[3] $_row[4] $_row[5] ? ";
                $_smt=self::$_pdo->pdo()->prepare($_sql); 
                $_smt->execute([$_row[2],$_row[6]]);

            }else{



                $_sql="SELECT * FROM {$_table} WHERE $_row[0] {$_row[1]} ? ";
                $_smt=self::$_pdo->pdo()->prepare($_sql);

                $_smt->execute([$_row[2]]);


            }


        }
            
        }else{
            
            
             $_sql="SELECT * FROM {$_table} ";
                $_smt=self::$_pdo->pdo()->prepare($_sql);

                $_smt->execute();
            
        }
      


        return $_smt;



    }





    public static function insert($_table,$_colum,$_datas){

        self::$_pdo=new Db();

        $_komma=",";
        $_vraagteken="?";
        $_concatnate="";

        for($_i=0;$_i < count($_datas); $_i++){


            if($_i > 0){

                $_concatnate.=$_komma.$_vraagteken;
            }else{
                $_concatnate=$_vraagteken;
            }






        }
     
            $_sql="insert into {$_table} ({$_colum}) values($_concatnate)  ";

        

        
        $_smt=self::$_pdo->pdo()->prepare($_sql);


        $_smt->execute($_datas);

    }


    public static function update($_table,$_data,$_where){
        /*UPDATE table_name
          SET column1 = value1, column2 = value2, ...
          WHERE condition;
          */
         self ::$_pdo=new Db();

        $_sqlOpe=["<",">","=","and","AND","or","OR","<>"];

        for($_i=0;$_i < count($_where); $_i++){

            $_where[0];//eerste table

            if(in_array($_where[1],$_sqlOpe)){

                $_row[0]=$_where[1]; //ope
            }

            $_where[2];//waarde;

            if(count($_where) > 3){

                if(in_array($_where[3],$_sqlOpe)){

                    $_row[1]=$_where[3]; //and of or 
                }  

                $_where[4];//table


                if(in_array($_where[5],$_sqlOpe)){

                    $_row[2]=$_where[5]; //and of or 
                }

                $_where[6];


            }

            if(count($_where) > 3){

                $_sql="update {$_table} set {$_data} WHERE $_where[0] $_row[0] ? $_row[1] $_where[4] $_row[2] ? ";
                $_smt=self::$_pdo->pdo()->prepare($_sql); 
                $_smt->execute([$_where[2],$_where[6]]);
            }else{
            
                
                $_sql="update {$_table} set {$_data} WHERE $_where[0] {$_row[0]} ? ";
              
                
                $_smt=self::$_pdo->pdo()->prepare($_sql);

                $_smt->execute([$_where[2]]);
                
                

            }


        }             


    }

    

public static function lastInsertId($_data,$_table){
    self ::$_pdo=new Db();
    $_smt= self::$_pdo->pdo()->query("select max($_data) from $_table");
   
    
   while ($_row = $_smt->fetch(PDO::FETCH_ASSOC)){
      return $_row["max($_data)"];
   }
    
}

    
    
    public static function delete($_table,$_where){
        //DELETE FROM table_name WHERE condition;
        
        
        
              self ::$_pdo=new Db();

        $_sqlOpe=["<",">","=","and","AND","or","OR","<>"];

        for($_i=0;$_i < count($_where); $_i++){

            $_where[0];//eerste table

            if(in_array($_where[1],$_sqlOpe)){

                $_row[0]=$_where[1]; //ope
            }

            $_where[2];//waarde;

            if(count($_where) > 3){

                if(in_array($_where[3],$_sqlOpe)){

                    $_row[1]=$_where[3]; //and of or 
                }  

                $_where[4];//table


                if(in_array($_where[5],$_sqlOpe)){

                    $_row[2]=$_where[5]; //and of or 
                }

                $_where[6];


            }

            if(count($_where) > 3){

                $_sql="DELETE FROM{$_table}  WHERE $_where[0] $_row[0] ? $_row[1] $_where[4] $_row[2] ? ";
                $_smt=self::$_pdo->pdo()->prepare($_sql); 
                $_smt->execute([$_where[2],$_where[6]]);
            }else{
            
                $_sql="DELETE FROM {$_table} WHERE $_where[0] {$_row[0]} ? ";
              
                
                $_smt=self::$_pdo->pdo()->prepare($_sql);

                $_smt->execute([$_where[2]]);
                
                

            }


        }  
        
        
    }

    public static function dataExists($_para){

        if($_para->rowCount() > 0){
            return true;
        }else{
            return false;
        }

    }


















}














