<?php 

function download($_srv,$_file){

    if(file_exists($_file)){

        header('Cache-Control:public');
        header('Content-Description:File Transfer');
        header("Content-Disposition:attachment;filename=$_file");

        header('Content-type:application/zip');
        header('Content-Tranfer-Encoding:chunked');
        readfile($_file);
        Redirect::to("$_srv=Aan het opladen");
    }else{
        Redirect::to("$_srv?msg=file bestaat niet, neem contact op met ontwikkelaar");
    }
}

