window.onload = initialize;
var etat1 = true;

function initialize() {
	document.getElementById("you-win").onclick = fermer;
	
	tick();
}

function fermer() {
	var element = document.getElementById("you-win");
	element.style.display = "none";
}


function tick() {
	var element = document.getElementById("you-win");
	var posY = element.offsetTop; // pour savoir la pos Y
	
	etat1 = !etat1;
	
	if (etat1) {
		element.style.color = "red";
		element.style.backgroundColor = "green";
	}
	else {
		element.style.color = "green";
		element.style.backgroundColor = "red";
	}
	
	if (posY < 300) {
		posY += 2;
		element.style.top = posY + "px"; // Pour affecter la pos Y
	}
	
	setTimeout(tick, 30);
}


































$(document).ready(function () {
	setTimeout(function () {
		$("#you-circle").fadeIn('slow', function () {
			$("#you-arrow").fadeIn('slow', function () {
				$("#you-text").fadeIn(6000);
			});
		});
	}, 2000);
});