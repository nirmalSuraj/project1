<?php


/*
 
 insert("t_users","d_naam,d_email,d_voornaam",[$_naam,$_email,$_voornaam])
 
*/
function insert($_table,$_colum,$_datas){

        global $_PDO;
            

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

        

        
        $_smt=$_PDO->prepare($_sql);


        $_smt->execute($_datas);

    }