<?php
try{
    require("../code/initialisatie.inc.php");

    require "../code/session_uitpakken.php";

    //om te kunnen shoppen  moet de gebruiker via de juiste weg komen!!
   
  
            /*
  Via deze script kunnen wij allen elemnten hide and show  regelen  */

            $_query="select  *  from v_bijwerken  where d_id={$_user}";

            $_resul=$_PDO->query("$_query");
            $_holder=0;
            $_ar=[];

            if($_resul->rowCount()!=0){

                while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){


                    $_ar[]=$_row['d_prijs'] * $_row['d_aantal'];



                }}


            for($_i =0; $_i < count($_ar); $_i++ ){
                $_holder+= $_ar[$_i];
            }
            echo $_holder;




            }catch(Exception $e){

                require("../php_lib/myExceptionHandling.inc.php");
                echo  myExceptionHandling($e, "../error/error.csv");


            }