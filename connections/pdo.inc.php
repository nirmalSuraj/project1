<?php
error_reporting(13);
  
if ($_SERVER['SERVER_NAME'] != "localhost")
{
	// database
	$_hostname = "";
	$_username = "";
	$_password = "";
	$_database = "";
	
	// andere project afhangkelijke waarden
	$_domain = "";
}
else
{
	// database
	$_hostname = "localhost";
	$_username = "root";
	$_password = "";
	$_database = "db_project1";
	
	// andere project afhangkelijke waarden
	//$_domain = "localhost:8888/webo/C_applicaties/APP_11_smtp";
}
  
$_PDO = new PDO("mysql:host=$_hostname; dbname=$_database","$_username", "$_password");
  
  
$_PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



?>