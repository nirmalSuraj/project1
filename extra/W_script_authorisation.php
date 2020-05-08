<?php
try
{
	//**********     Initialisatie
	require("../connections/pdo.inc.php");
	$_srv = $_SERVER['PHP_SELF'];
	$_info="";
	$_comment="";
	$_authorized=array();
	$_content="";
	$_sb="[]";
	$_a="";
	$_aantalRollen=8;

	//**********     ophalen van scripts uit folder
	if (!isset($_POST['submit']))
	{	
		$_dir = opendir("../scripts"); // open de "script" folder

		if ($_dir == FALSE) // indien openen niet gelukt is ...
		{
			throw new Exception("Folder (../scripts) kan niet geopend worden");
		}


		while ( ($_file = readdir($_dir)) !== false) // lees alle files in folder
		{
			$_lijst[]=$_file; // plaats de file-naam in de array $_lijst
		}

		closedir($_dir); // sluit de folder

		//**********     verwerken van opgehaalde scripts	

		sort($_lijst); // sorteer de array

		foreach ($_lijst as $_file)  //ga alle files uit de lijst af
		{
			$_lengte= strlen($_file);  // bepaal de lengte van de file-naam
			$_extensie = substr($_file,($_lengte - 3),3); // extensie (php) 
			$_script = substr($_file,0,($_lengte - 4)); // zonder .php

			if ($_extensie == "php") // php file
			{
				$_query="SELECT * FROM ts_authorisation WHERE d_script = '$_script';";

				$_result = $_PDO -> query("$_query"); 

				if ($_result -> rowCount() > 0)
				{
					while ($_row = $_result -> fetch(PDO::FETCH_ASSOC)) 
					{
						for($_x=0; $_x <=$_aantalRollen;$_x++)
						{
							$_authorized[$_x]= $_row["d_$_x"];
						}
					}
				}
				else
				{
					for($_y=0; $_y <= $_aantalRollen; $_y++)
					{
						$_authorized[$_y]= 0;
					}

					$_query="INSERT INTO ts_authorisation (d_script) 
								 VALUES ('$_script');";
					$_result = $_PDO -> query("$_query");
				}	

				$_content.="\n<tr><td><input type=text name=scripts[] value=$_script readonly</td>";

				for($_z=0; $_z <=$_aantalRollen; $_z++)
				{

					$_content.="<td><input type=checkbox name=box_$_z$_sb value=1";

					if ($_authorized[$_z]==1)
					{
						$_content.=" checked></td>";
					}
					else
					{
						$_content.="></td>";
					}
				}
				$_content.="</tr>";	
			}
		}

		$_inhoud="<h1>Script-authorisation</h1>
	<form method=POST action= $_srv>
	<br><br>
	<input type=submit name=submit value=submit>
	<table style='width:100%'> 
	  <tr>
      <th>script&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";

		for($_w=0; $_w <=$_aantalRollen; $_w++)
		{
			$_inhoud.="<th>$_w&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
		}
		$_inhoud.="</tr>$_content</table><br><br>
	<input type=submit name=submit value=submit>
	</form>";
	}
	else
	{
	//**********     formulier verwerken  
		
		$_scripts = $_POST['scripts'];
		
		foreach ($_scripts as $_key => $_waarde)
		{
			
		}
		$_inhoud='done !';
	}
	/*******************************************
*    output
********************************************/  
	echo ($_inhoud);

}

catch (Exception $_e)
{
	// exception handling funtions 
	include("../php_lib/myExceptionHandling.inc.php"); 
	echo myExceptionHandling($_e,"../logs/error_log.csv");
}



?>