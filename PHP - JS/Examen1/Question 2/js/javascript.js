var listeNuages = new Array();

window.onload = function animer() {
	ajoutNuage();
	tick();
}

function ajoutNuage() {
	listeNuages.push(new Nuage());
	setTimeout(ajoutNuage,3000);
	console.log("Ajout du nuage num "+listeNuages.length);
}

function tick() {
	for (var i = 0; i < listeNuages.length; i++){
		listeNuages[i].tick(i);
	}
	setTimeout(tick,30);
}

function Nuage() {
	this.nuage = document.createElement("div");
	this.speed = Math.random() * 3;
	this.y = Math.random()*350;
	this.x = -175;
	this.ecran = document.getElementById("container");
	this.nuage.setAttribute("class","nuage");
    this.nuage.style.top = this.y+"px";
    this.nuage.style.left = this.x+"px";
	
	this.ecran.appendChild(this.nuage);
	
	this.tick = function(i){
		this.x += this.speed;
		this.nuage.style.left = this.x+"px";
		
		if (this.x >= 700) {
			listeNuages.splice(i,1);
            this.ecran.removeChild(this.nuage);
			console.log("Suppression d'un nuage");
		}
	}
}