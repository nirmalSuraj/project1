<?php

/*
-contruct  var
-private error methode en propety
-methode private bestaat deze data in datanase ja of nee
-methode 

*/


class Validatie{

    // alle error hier opslaan
    private $_error=[];


    /*

 $_data soort superglobel, post of get.
 $_config is een array met verschillende regels voor validatie
*/
    public function validate($_data,$_config){




        foreach($_config as $_var=>$_ruls){


            if(!empty(Variabe::type($_data,$_var))){



                foreach($_ruls as $_x=>$_values){


                    switch ($_x){
                        case "charMax":


                            if(strlen(Variabe::type($_data,$_var)) <= $_values){

                            }else{

                                $this->_error[]="karakters van ".$_var." moeten kleiner zijn dan $_values ";
                            }

                            break;
                        case "charMin":
                            if(strlen(Variabe::type($_data,$_var)) >= $_values){

                            }else{

                                $this->_error[]="karakters van ".$_var." moeten groter zijn dan $_values ";
                            }

                            break;
                        case "require":
                            if(!$_values){
                                $this->_error[]="er is iets misgelopen  bij $_var";
                            }

                            break;
                        case "ad":

                            if(!preg_match("/$_values/",Variabe::type($_data,$_var))){

                                $this->_error[]="Vul $_var correct in";
                            }
                            break;
                        case "vergelijk":

                            if(Variabe::type($_data,$_var) != Variabe::type($_data,$_values)){
                                $this->_error[]="Paswoord komt niet overeen";
                            }
                            break;
                        case "hoofdletter":

                            $_aantal="";

                            for($_i=0;$_i < $_values;$_i++){

                                $_aantal.="[A-Z]";
                            }

                            if(!preg_match("@{$_aantal}@", Variabe::type($_data,$_var))  ){
                                $this->_error[]="Uw {$_var} moet meer dan {$_values}  hoofdletter hebben";

                            }
                            break;
                        case "nummers":
                            $_aantal="";

                            for($_i=0;$_i < $_values;$_i++){

                                $_aantal.="[0-9]";
                            }

                            if(!preg_match("@{$_aantal}@", Variabe::type($_data,$_var))  ){
                                $this->_error[]="Uw {$_var} moet meer dan {$_values}  cijfers hebben";

                            }
                            break;

                        case "drop":

                            if(Variabe::type($_data,$_var) == $_values){
                                $this->_error[]="$_var Gelieve aan te duiden";
                            }
                            break;
                        case "btw":
                            //alle space verwijderen 
                            $_string=str_replace(' ', '', Variabe::type($_data,$_values));
                            //twee voorste letter eruithalen
                            $_be=substr($_string,0,strlen($_string)-10);

                            if(strtoupper($_string) != $_string){
                                $this->_error[]="'$_be' deze moeten hooefdletters zijn";
                            }else{
                                //nummer filteren
                                $_nummer=substr($_string,strlen($_string)-10,strlen($_string));
                                //deel 1--> eerste 7 cijfers
                                $_deel1=substr($_nummer,0,strlen($_nummer)-2);
                                //deel 2-----> twee laatse cijfers
                                $_deel2=substr($_nummer,strlen($_nummer)-2,strlen($_nummer)-8);
                                //restwaarde van deel
                                $_modul = $_deel1%97;
                                //restwaarde plus deel2, als het gelijk is aan 97 dan goegekeurd 
                                if(($_modul + $_deel2)==97 ){

                                }else{

                                    $this->_error[]="$_var nummer klopt niet";
                                }

                            }




                            break;

                    }
                }

            }else{

                $this->_error[]=$_var." Leeg";

            }



        }



    }



    /*
       door deze op te roepen kan jij zien of dat gegevens zijn juist aangekomen.
       als alle gegevens goed zijn dan return true.
       op deze manier kunnen wij de data controleren van uit database of iet toevoegen.
    */

    public function check(){



        if(empty($this->errorValidate())){

            return true;


        }else{
            return false;
        }



    }




    /*

    als error niet bestaan dan geeft dit lijst van alle error.
        */

    public function errorValidate(){
        $_string="";
        if(!empty($this->_error)){

            foreach($this->_error as $_value){
                $_string .= $_value.", ";

            }
            return $_string;
        }
    }

}

