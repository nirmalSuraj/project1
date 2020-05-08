<?php
try{
    require("../code/initialisatie.inc.php");

    require "../code/session_uitpakken.php";
    //mag updaten ?
    $_SESSION['update']=false;
    //als product bestaat in stock dan is het true
    $_check_stock=false;

    //om te kunnen shoppen  moet de gebruiker via de juiste weg komen!!
    $_toegang=[1,4,5,6];
    /*om hier te binnen moegen moet langs éé van volgende wegen binnen komen 
    -shoppen
    -lijst(car icone)
    */
    if (!isset($_SESSION["actie"]) || !in_array($_SESSION["actie"],$_toegang) || !isset($_POST['toegang']) || $_POST['toegang'] != "ja"){

        throw new Exception("illegal access");
    }



    /*wij gaan eerste controleren of dat aantal producten zijn ingegeven.
    Daarna gaan wij controleren of dat deze product al in shopping list aanwezig zijn. 
    als het aanwezig is dan kunnen wij allen maar updaten , als het niet aanwezig is dan toevoegen
    */

    if(isset($_POST['aantal'])){

        /*wij gaan controleren  of dat product aanwezig is in stock als het true dat wil zeggen dat de product niet aanwezig is */
        //query sturen 
        $_query = "select d_stock from t_producten where d_index =? and 
                d_stock = 0 ";
        //voorbereiden 
        $_resul=$_PDO->prepare("$_query"); 
        //excuteren
        $_resul->execute([$_POST['id']]);
       // product is niet aanwezig
        if($_resul->rowCount() > 0){

            echo true;
           
        }else{
           

            if($_POST['aantal']!=0){
                /*als de input waarde is groter dan de d_aantal waarde in t_list 
          dan updaten. indien niet (dit wil zeggen dat deze product nog niet is toegevoegd.
          en daarom kunnen wij ook niet updaten )*/

                if(isset($_POST['check']) && $_POST['check'] == "check"){
                    //query sturen
                    $_query = "select d_aantal from t_list where t_producten_d_index =? and d_index=? and
                d_aantal > ? and d_index=?";
                    //voorbereiden 
                    $_resul=$_PDO->prepare("$_query"); 
                    //excuteren
                    $_resul->execute([$_POST['id'],$_user,$_POST['aantal'],$_user]);

                    if($_resul->rowCount() > 0){

                        $_SESSION['update']=false;
                        exit();
                    }else{

                        $_SESSION['update']=true;


                    }

                }
                require "../code/chech_product.php";
                //contolren mag de waarde upgedate worden 

                if( $_SESSION['update'] || $_POST['check'] == "update"){


                    //query sturen
                    $_query = "select t_producten_d_index from t_list where t_producten_d_index =? and d_index=?";
                    //voorbereiden 
                    $_resul=$_PDO->prepare("$_query"); 
                    //excuteren
                    $_resul->execute([$_POST['id'],$_user]);
                    //controleren of dat deze product aanwezig is in de list
                    if($_resul->rowCount() > 0){
                        //indien ja update
                        if($_check_stock){
                        update("t_list","d_index={$_user},t_producten_d_index={$_POST['id']},d_aantal={$_POST['aantal']}",["d_index","=",$_user,"and","t_producten_d_index","=",$_POST['id']]);
                        }else{
                            echo  true;
                        }
                    }else{
                        //indien niet toevoegen
                        if($_check_stock){
                            insert("t_list","d_index,t_producten_d_index,d_aantal",[$_user,$_POST['id'],$_POST['aantal']]);
                        }else{
                            echo true;
                        }
                        
                    }

                }


            }else{
                //als de aantalwaarde binnen komt als 0 waarde verwijder deze product
                $_id=$_POST['id'];
                delete("t_list",["d_index","=",$_user,"and","t_producten_d_index","=",$_id]);
            }


        }

    }


}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}