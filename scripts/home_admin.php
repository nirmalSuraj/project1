<?php
try{
    require("../code/initialisatie.inc.php");

    require "../code/session_uitpakken.php";
 
    $_tpl='home_klant.tpl';
    $_menu=4;
    
    
    $_query="select d_stock,d_productNaam from t_producten where d_stock <= 10";
    
     $_resul=$_PDO->query("$_query");
    
    if($_resul->rowCount() == 0){
        $_error="Er is misgelopen";
        
    }else{
         $_inhoud="  <div class='col-md-12 border' >
        <h1>Te bestellen  </h1>
        
        <table id='list_data'>
          <th>Te bestellen producten </th>
    <th>Instock</th>
        ";
        while($_row=$_resul->fetch(PDO::FETCH_ASSOC)){
            
            $_inhoud.="<tr> <td> {$_row["d_productNaam"]}</td>
         <td> {$_row["d_stock"]} </td> </tr> ";
            
        }
       
    }
    
   
       
        
        $_inhoud.="</table></div>";


    require "../code/output.inc.php";
}catch(Exception $e){

    require("../php_lib/myExceptionHandling.inc.php");
    echo  myExceptionHandling($e, "../error/error.csv");


}