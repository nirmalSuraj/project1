<?php

 if($_SESSION['tabelIndex'] != "v_selectproducten"){
     $_query = createSelect($_create_table, 
		array($_naam, $_voornaam, $_straat, $_nr,$_pk, $_telefoon, $_mail, $_gender, $_soort), 
			array('d_naam', 'd_voornaam', 'd_straat','d_huisNummer', "d_pk", 'd_telefoonnummer', 'd_email', 'd_sex_index', 'd_rol_index')); 
 }else{
      $_query = createSelect($_create_table, 
		array($_index,$_naam), 
			array("d_index",'d_productNaam')); 
 }
 

