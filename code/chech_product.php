<?php


            //query sturen
            $_query_pro = "select * from t_producten where d_index =? ";
            //voorbereiden 
            $_resul_pro=$_PDO->prepare("$_query_pro"); 
            //excuteren
           
            $_resul_pro->execute([$_POST['id']]);
            //controleren of dat deze product aanwezig is in de list
            if($_resul_pro->rowCount() > 0){

                while($_row_pro=$_resul_pro->fetch(PDO::FETCH_ASSOC)){
                    
                   if($_POST['aantal'] <= $_row_pro['d_stock'] && $_row_pro['d_stock'] >= $_POST['aantal']){
                       $_check_stock=true;
                   }
                    

                }

            }



//als input kleiner is dan d_aantal dan d_stock(t_prodcten ) + input waarde 