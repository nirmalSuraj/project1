function vergelijk() {
	if ((document.getElementById("paswoord").value != 				document.getElementById("confirmeer").value)
		|| (document.getElementById("paswoord").value ==""))
	{
		document.getElementById("boodschap").innerHTML = '<p>Paswoord en Confirmatie moeten gelijk zijn</p>';
		document.getElementById("verstuur").innerHTML = '';
	} else if (document.getElementById("paswoord").value != "") {
		document.getElementById("boodschap").innerHTML = '';
		document.getElementById("verstuur").innerHTML = '<input type=submit id=submit name=submit>';
	}
}
