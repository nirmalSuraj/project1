<?php
 //controleren of dat user bestaat
        $_query="select * from $_table where t_soort_d_index =?  LIMIT 20";
        //voorbereiden 
        $_resul=$_PDO->prepare("$_query"); 
        //excuteren

        $_resul->execute([$_POST['soort']]);
        if($_resul->rowCount() != 0){

            $_start=$_POST['soort'];
            while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){
                //formulier pructenlijst 
               
                require "../code/producten.php";

            }

        }else{
            echo "Er zijn geen producten beschikbaar";
       
        }