<?php

function drop($_file,$_id){
    
    $_file = fopen($_file,"r");

$_output= "<select id=$_id >";
    while(!feof($_file)){

                list($_data)=explode(" ",fgetcsv($_file)[0]);
             
        
                    $_output.="<option value={$_data} >$_data</option>";
      

            } 
    $_output.= "</select>";
fclose($_file);
    return $_output;
}