<?php
try{
    require("../code/M_initialisatie.inc.php");

    require "../code/session_uitpakken.php";
    /*
   in deze script kunnen wij data bekijken en niuwe data ingeven.
   Dan doosturen klant_data_aanpassen daar wordt de data aangepast

    */
 
    $_tpl='profiel.tpl';
    $_toegang=[3,6];
    /*om hier te binnen moegen moet langs éé van volgende wegen binnen komen 
    -select
    */
  
    
    if (!isset($_SESSION["actie"]) || !in_array($_SESSION["actie"],$_toegang)){

        throw new Exception("illegal access");
    }
    
   $_inhoud="
   <h3> Kies wat u wilt aanpassen of bekijken</h3>
   <form id='rbForm' method='post'  action='$_srv' >".
      
       Button("mnc", "t_mnemonic_user", "d_index","d_mnemonic" , $_start = 0, $_select = 0, $_extra ="
   onclick=document.getElementById('rbForm').submit()
   ")."</form>";
    
    if(!isset($_POST['mnc'])){
         $_producten="Maak een keuze";
        
    }else{
           
    $_query="select * from t_mnemonic_user  where d_index={$_POST['mnc']}";
    
        $_resul=$_PDO->query("$_query");
        
        if($_resul->rowCount() <= 0){
            throw new PDOException("database inconsistentie ");
        }
        
         while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){
             
             $_SESSION['tabelIndex']=$_row['d_table'];
             Redirect::to("klant_select.php?actie=6");
             
         }
        
    }
   
    
    /*if(!isset($_POST['mnc'])){
         $_producten="Maak een keuze";
        
    }else{
        
                 
    $_query="select * from t_mnemonic_user  where d_index={$_POST['mnc']}";
    
        $_resul=$_PDO->query("$_query");
        
        if($_resul->rowCount() <= 0){
            throw new PDOException("database inconsistentie ");
        }
        
         while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){
               $_inhoud="
   <h3> Kies wat u wilt aanpassen of bekijken</h3>
   <form id='rbForm' method='post'  action='$_srv' >".
             $_producten="<button cass='profiel_button'><a href=''></a></button>";
             $_SESSION['tabelIndex']=$_row['d_table'];
            $_inhoud.= "</form>";
             
         }
        
    }
*/
    $_menu=3;



    require "../code/output.inc.php";
}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}