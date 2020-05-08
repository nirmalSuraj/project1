<?php
    
function upload_img($_img,$_extends,$_size){
    //get filenam
    $_img_naam=$_img['name'];//
    $_img_type=$_img['type'];
    $_img_tmp=$_img['tmp_name'];
    $_img_error=$_img['error'];
    $_img_size=$_img['size'];
    // get type
    //get tmp
    //get error
    //get size

    //haal file extend uit door expload
    $_extend= end(explode(".",$_img_naam));
    //alle extend naar lowercase
    //end() last data
    //maak een array wat voor extends mogen binnen laten

    if(in_array($_extend,$_extends)){
        if($_img_error === 0){

            if($_img_size <= $_size){
                //make randomid
                include "../class/randomChar.class.php";
                //uniek factuur id maken 
                $_id= "FT".randomChar::char().randomChar::char();
                $_nieuw_img=$_id.".".$_extend;
              
                $_nieuw_path="../img/".$_nieuw_img;
                  
                move_uploaded_file($_img_tmp,$_nieuw_path);
              
                return "$_nieuw_path-".true;
            }else{
               return "bestan veel te groot";
            }
        }else{
            //todo
        }

    }else{
        //todo
    }
    

    //check of dat extends is geldig
    //check op error 
    //op file size 

    //nieuwe naam van file door uniqidid 
    //path van waar img
    //move_uploaded_file(tmp,nieuwfile);


}