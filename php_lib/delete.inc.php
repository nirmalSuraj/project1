<?php
    
 function delete($_table,$_where){
        //DELETE FROM table_name WHERE condition;
        
        
        
            global $_PDO;

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

                $_sql="DELETE FROM {$_table}  WHERE $_where[0] $_row[0] ? $_row[1] $_where[4] $_row[2] ? ";
                $_smt=$_PDO->prepare($_sql); 
                $_smt->execute([$_where[2],$_where[6]]);
               
            }else{
            
                $_sql="DELETE FROM {$_table} WHERE $_where[0] {$_row[0]} ? ";
              
                
                $_smt=$_PDO->prepare($_sql);

                $_smt->execute([$_where[2]]);
                
                

            }


        }  
        
        
    }