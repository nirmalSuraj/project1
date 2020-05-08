<?php
try{
    require "../code/initialisatie.inc.php";
    require "../code/session_uitpakken.php";
    require "../class/Session.class.php";
    require "../php_lib/destroy.php";
    
   
    
    if(destroy()){
        
      $_query="update t_authentication 
                            set 
                            d_token='',
                            d_identifier='',
                            d_expire=0,
                            d_faultcntr=0,
                            d_timeOut=0

                            where d_user='{$_user}'";

                    $_PDO->query("$_query"); 
        Redirect::to("../index.php");
    }
   

    
}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}
