<?php
function cleanInput()
{
	foreach($_POST as $_name => $_inhoud )
	{
		// verschillende "cleaning" acties   
		$_clean = trim($_inhoud);    
		$_clean = stripcslashes($_clean); 
		$_clean = htmlspecialchars($_clean); 

		// zet de “cleaned” versie van de input terug in $_POST
		$_POST[$_name] = $_clean;
	}
}
?>
