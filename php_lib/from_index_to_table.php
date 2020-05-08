<?php
function from_index_to_table($_postcode, $_gemeenteNaam)
{
  global $_PDO;

$_prev_par = false;
	
  $_query = "SELECT d_index FROM  t_gemeente"; 
	/* eerste deel van de query 
	   we hebben enkel d_gemeente nodig
	   dus selecteren we enkel deze kolom */

  if ($_postcode!= "")  // is postcode ingegeven ?
  {		  
    $_query.= " WHERE ";  // we vervolledigen  de query met WHERE
					
    $_query.="d_index = '$_postcode'";
		// we vervolledigen  de query met de kolom en de ingegeven waarde
    $_prev_par = true;	// er is nu een kolom toegevoegd aan de query
  }	
  
  
  if ($_gemeenteNaam != "") //is de gemeente naam ingegeven ?
  {	
    if ($_prev_par) // is er al een kolom (postcode) toegevoegd aan de query
    {
      $_query.= " AND "; // vervolledig met AND
		  }	
		  else
		  {  // nee
			   $_query.= " WHERE "; // vervolledig met  WHERE
		  }	
		
		  $_query.="d_index ='$_gemeenteNaam'";
		// we vervolledigen  de query met de kolom en de ingegeven waarde
		  $_prev_par = true;	// er is nu minstens één kolom toegevoegd aan de query
	 }
	
	if ($_prev_par) // was er minstens één input (postcode of naam)
	{
		 $_result = $_PDO -> query("$_query"); 

   if ( $_result -> rowCount() > 0)
   {

     while($_row = $_result -> fetch(PDO::FETCH_ASSOC)) 
     {
       $_return = $_row['d_index'];
     }
   }
  }
  
	 return $_return;

}
