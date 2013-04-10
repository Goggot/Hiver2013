

function valider() {
	var courriel = document.getElementById('courriel').value;
	var motDePasse = document.getElementById('pwd').value;
	var succes = true;
	
	document.getElementById('labelCourriel').style.color = "black";
	document.getElementById('labelMotDePasse').style.color = "black";
	
	if (courriel.length < 6) {
		succes = false;
		document.getElementById('labelCourriel').style.color = "red";
	}
	
	if (motDePasse.length < 6) {
		succes = false;
		document.getElementById('labelMotDePasse').style.color = "red";
	}
	
	return succes;
}

function showInfo(node) {
	document.getElementById("informationBox").style.top = (node.offsetTop - 80) + "px";
	document.getElementById("informationBox").style.left = (node.offsetLeft + 10) + "px";
	document.getElementById("informationBox").style.display = "block";
}

function hideInfo() {
	if (document.getElementById("informationBox").style.display == "block") {
		setTimeout(function () {document.getElementById("informationBox").style.display = "none"; }, 1000);
	}
}