window.onload = function () {
	document.getElementById('help').onmouseover = function () {
		var top = document.getElementById('help').offsetTop;
		var left = document.getElementById('help').offsetLeft;
		
		document.getElementById('informationBox').style.top = (top - 80) + "px";
		document.getElementById('informationBox').style.left = (left + 20) + "px";
	
		document.getElementById('informationBox').style.display = "block";
	}
	
	document.getElementById('help').onmouseout = function () {
		setTimeout(function () {
			document.getElementById('informationBox').style.display = "none";
		}, 2000);
	}
}

function valider() {
	document.getElementById('divCourriel').style.color = "black";
	document.getElementById('divMDP').style.color = "black";

	var courriel = document.getElementById('courriel').value;
	var motDePasse = document.getElementById('pwd').value;
	var succes = true;
	
	if (courriel.length < 6) {
		succes = false;
		document.getElementById('divCourriel').style.color = "red";
	}
	
	if (motDePasse.length < 6) {
		succes = false;
		document.getElementById('divMDP').style.color = "red";
	}
	
	return succes;
}







