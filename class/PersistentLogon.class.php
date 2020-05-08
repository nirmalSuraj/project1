<?php

class PersistentLogon extends Conec{
    
    private static $_pdo;
   public static function persistent()
{
// functie om security problemen te loggen
       
    
	//require_once("../php_lib/logSecurityInfo.inc.php");
	self::$_pdo=new PersistentLogon();
       
	 $_PDO=self::$_pdo->pdo();
       
	$_time = time();

	//***************** persistentie cookie 
	if (isset($_COOKIE["auth"]))
	{
		list($_identifier, $_token) = explode(':', $_COOKIE["auth"]);

		if (ctype_xdigit ($_identifier) && ctype_xdigit ($_token)) 
		{ 
            
			// token en identifier correct aanwezig 
			// kijk nu of deze ook in de database aanwezig zijn 




			$_prepQuery="SELECT d_user, d_rol, d_logon 
											FROM t_authentication 
		 									WHERE (d_token = :token 
		      						AND d_identfier = :identifier
											AND d_expire > :time);";

			$_result=$_PDO->prepare("$_prepQuery");

			  $_result->execute(array('token'=>$_token,
														'identifier'=>$_identifier,
														'time'=> $_time));


         
			if ($_result -> rowCount() == 1) // logon gekend
			{

				While ($_row = $_result -> fetch(PDO::FETCH_ASSOC))

					// logon gegevens ophalen
				{  
					// cookie gezet binnen de vorige x uur 
					// m.a.w. cookie nog niet afgelopen

					$_SESSION['index'] = $_row['d_user'];
					$_SESSION['rol'] = $_row['d_rol'];
					$_SESSION['authenticated'] = true;
					$_SESSION['logon'] = $_row['d_logon'];

					//require_once("../php_lib/logSecurityInfo.inc.php");
					//logSecurityInfo($_SESSION["logon"], "Persistent aangelogd");

					return (true); 
					// persistent ingelogged
				}
			} 
			else
			{
				return (false); 
				// combinatie identifier & token niet gevonden
			}
		}
		else
		{
			return (false);
			// aanwezig cookie niet correct
		}
	}
	else
	{
		return (false);
		// geen cookie aanwezig
	}
}
}