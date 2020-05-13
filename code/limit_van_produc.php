<?php
//maak query om 10 producten te selecteren 
            $_query="select * from $_table limit {$_POST['limit']}";
            //voorbereiden 
            $_resul=$_PDO->query("$_query"); 
            //zijn er producten?
            if($_resul->rowCount() != 0){


                while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){
                    //formulier pructenlijst 
                    require "../code/producten.php";

                }

            }else{
                throw new Exception("producten niet gevonden");
            }
