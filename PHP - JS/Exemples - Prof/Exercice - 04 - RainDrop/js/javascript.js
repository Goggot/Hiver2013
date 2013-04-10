var spriteList = new Array();
var ctx = null;

window.onload = function () {
	// Initialisation du contexte
	ctx = document.getElementById("canvas").getContext("2d");
	
	// Ajout du premier sprite : l'image background
	spriteList.push(new BackgroundSprite());
	
	// Appel du premier tick 
	tick();
}

function tick() {
	for (var i = 0; i < spriteList.length; i++) {
		var aSupprimer = spriteList[i].tick();
		
		if (aSupprimer) {
			// Retrait du tableau
			spriteList.splice(i, 1);
			i--;
		}
	}

	// Environ 30% de chance de faire une goutte
	if (Math.random() < 0.3) {
		spriteList.push(new Drop());
	}
	
	setTimeout(tick, 30);
}

function Drop() {
	this.size = 6;
	this.y = -10;
	this.x = Math.random() * 500;
	
	this.tick = function () {
		this.y += 2;
		ctx.fillStyle = "blue";
		ctx.fillRect(this.x, this.y, this.size/3, this.size);
		
		return this.y > 300; // en bas de l'écran, donc on dit au tick principal de le retirer
	}
}

function BackgroundSprite() {
	this.imageLoaded = false;		// etat si l'image est chargée ou pas en mémoire
	this.image = new Image();		// Création de l'objet image (natif JS)
	var sprite = this;				// Affectation à une variable temporaire, pour le onload
	
	this.image.onload = function () {
		sprite.imageLoaded = true;	
	}
	this.image.src = "images/landscape.png"; // Source de l'image
	
	this.tick = function () {
		if (this.imageLoaded) {				// Affichage slmt quand image chargée
			ctx.drawImage(this.image, 0, 0);
		}
		
		return false;
	}
}












