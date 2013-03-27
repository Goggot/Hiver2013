// JavaScript Document

var compteur=0;
var posX=0;
var posY=0; 
var tableau = new Array(); //ou []
var i=0; 			
var id ="";

function dessinerCarrer(event , element, carrer)
{
	console.log("nous sommes dans la fonction dessiner carrer"); 
	var left = event.pageX;
	var top = event.pageY;
	console.log("valeur de top: "+top + "valeur de left: " + left);
	document.getElementById('carrer').style.width = "100px";
	document.getElementById('carrer').style.height = "100px";
	document.getElementById('carrer').style.top = (top-50) +"px";
	document.getElementById('carrer').style.left = (left-50) +"px";
	document.getElementById('carrer').style.display= "block"; 
	 posX= document.getElementById('carrer').offsetLeft;
	 posY= document.getElementById('carrer').offsetTop;
}

function creerDivCarrer()
{
	id= "autre_carrer" + (compteur++);
	maDiv = document.createElement("div");
	maDiv.id = id;
	maDiv.style.backgroundColor="#6633FF"; 
	maDiv.style.width ="100px";
	maDiv.style.height ="100px";
	maDiv.style.position="absolute";
	maDiv.style.top =posY +"px";
	maDiv.style.left =posX +"px"; 
	console.log("left: " + posX + "top: " + posY); 
	tableau[compteur]= maDiv;
	document.getElementById('ecran').appendChild(maDiv);
	setInterval(demarrer , 100);
	console.log("creation d'un div carrer" + document.getElementById(id).style.top);
}

function demarrer()
{
	var heightEcran = document.getElementById('ecran').offsetHeight;
	var top = document.getElementById(id).offsetTop;
	var diff = heightEcran - top; 
	
	if(diff > 0)
	{
		document.getElementById(id).style.top = (top +5)+"px";
	}
	else 
		document.getElementById(id).style.display ="none";
   
}
function afficherElement()
{
	for(var i=0 ; i < tableau.length ; i++)
		tableau[i].style.top = (top +5)+"px";
	
	afficher();
}