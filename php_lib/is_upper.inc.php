<?php

/*

  met deze functie kan jij vergelijken of dat uw string upper case 

*/
function is_upper($_string){

       if(strtoupper($_string) != $_string){
       return 0;
       }else{
       return 1;
       
      }

}