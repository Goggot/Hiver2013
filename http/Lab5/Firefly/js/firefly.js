var listeEtoile = new Array();
var listeEnterprise = new Array();
var listeShip = new Array();
var listeMissile = new Array();
var ct=0;

window.onload = function(){
    
}

document.onkeypress = keyPressed;

function Vaisseau(){
    this.vaisseau = document.createElement("div");
    
    this.vaisseau.setAttribute("class","joueur");
    this.ecran = document.getElementById("jeu");
    this.x=250 +"px;";
    this.y=450 +"px;";
    this.vaisseau.setAttribute("style", "top:"+ this.y+"left:"+this.x);
    this.vaisseau.id="vaisseau";
    
    this.ecran.appendChild(this.vaisseau);
}

function Enterprise(){
	this.enterprise = document.createElement("div");
    this.speed = Math.random() * 2;
    this.x = Math.random()*900;
    this.y = -20;
    this.ecran = document.getElementById("jeu");
    this.taille = "150px";
    this.enterprise.setAttribute("class","enterprise");
    
    this.enterprise.style.height = this.taille;
    this.enterprise.style.width = this.taille;
    
    this.enterprise.style.top = this.y+"px";
    this.enterprise.style.left = this.x+"px";
    
    this.ecran.appendChild(this.enterprise);
	
    this.tick = function(i) {
        this.y += this.speed;
        this.enterprise.style.top = this.y+"px";
		
		if (this.y >= 700){
            listeEnterprise.splice(i,1);
            this.ecran.removeChild(this.enterprise);
        }
    }
}

function Ship(){
    this.ship = document.createElement("div");
    this.speed = Math.random() * 2;
    this.x = Math.random()*900;
    this.y = -20;
    this.ecran = document.getElementById("jeu");
    this.taille = "150px";
    this.ship.setAttribute("class","ship");
    
    this.ship.style.height = this.taille;
    this.ship.style.width = this.taille;
    
    this.ship.style.top = this.y+"px";
    this.ship.style.left = this.x+"px";
    
    this.ecran.appendChild(this.ship);
	
    this.tick = function(i) {
        this.y += this.speed;
        this.ship.style.top = this.y+"px";
		
		if (this.y >= 700){
            listeShip.splice(i,1);
            this.ecran.removeChild(this.ship);
        }
    }
}

function Etoiles(){
	this.etoile = document.createElement("div");
    this.speed = Math.random() * 1;
    this.x = Math.random()*900;
    this.y = Math.random()*750-50;
    this.taille = Math.random() * 1 + 1;
    this.valid = false;
    this.ecran = document.getElementById("jeu");
    
    this.etoile.setAttribute("class","etoile");
    
    this.etoile.style.height = this.taille+"px";
    this.etoile.style.width = this.taille+"px";
    
    this.etoile.style.top = this.y+"px";
    this.etoile.style.left = this.x+"px";
    
    this.ecran.appendChild(this.etoile);
    
    this.tick = function(i) {
        this.y += this.speed;
        this.etoile.style.top = this.y+"px";
        
        if (this.y >= 700){
            listeEtoile.splice(i,1);
            this.ecran.removeChild(this.etoile);
        }
    }
}

function Missile() {
	this.missile = document.createElement("div");
    this.speed = 3;
	this.vaisseau = document.getElementById("vaisseau");
    this.x = vaisseau.offsetLeft+ (vaisseau.offsetWidth/2);
    this.y = vaisseau.offsetTop + 20;
    this.ecran = document.getElementById("jeu");
    
    this.missile.setAttribute("class","missile");
    
    this.missile.style.height = "12px";
    this.missile.style.width = "2px";
    
    this.missile.style.top = this.y+"px";
    this.missile.style.left = this.x+"px";
    
    this.ecran.appendChild(this.missile);
    
    this.tick = function(i) {
        this.y -= this.speed;
        this.missile.style.top = this.y+"px";
        
        if (this.y <= 0){
            listeMissile.splice(i,1);
            this.ecran.removeChild(this.missile);
        }
    }
}

function GameOver() {
    console.log("Game over");
}

function amorcerJeu(event){
    console.log("Test");
    if (event.which == 32){
        document.getElementById("splash").style.display="none";
        document.getElementById("jeu").style.display="block";
        tick();
    }
}

function tick(){
    var valid = true;
    if (listeEtoile.length < 400) {
        for (var i = 0; i < 3; i++)
            listeEtoile.push(new Etoiles());
    }
    if (Math.random() < 0.005){
		var gnagna = Math.random();
		if (gnagna > 0.5)
			listeEnterprise.push(new Enterprise());
		else {
			listeShip.push(new Ship());
		}
    }
    
    for (var i=0; i < listeEtoile.length; i++){
        listeEtoile[i].tick(i);
    }
    
    for (var i=0; i < listeEnterprise.length; i++){
        listeEnterprise[i].tick(i);
    }
	
	for (var i=0; i < listeShip.length; i++){
        listeShip[i].tick(i);
    }
	
	for (var i=0; i < listeMissile.length; i++){
        listeMissile[i].tick(i);
    }
 
    setTimeout(tick,10);
}

function keyPressed(event)
{
	console.log(event.which);
    if(event.which == 13)
    {
        if(ct==0){
            var main = document.getElementById("splash");
            var other = document.getElementById("jeu");
            main.style.display= "none";
            other.style.display="block";
            v = new Vaisseau();
            debuter = true;
            ct++;
            tick();
        }
        else if(ct ==1){
            var newOne = document.getElementById("over");
            var current = document.getElementById("jeu");
            current.style.display= "none";
            newOne.style.display="block";
        }
    }
    else if(event.which == 100){
        var jet = document.getElementById("vaisseau");
        var x = document.getElementById("vaisseau").offsetLeft;
        var y =	document.getElementById("vaisseau").offsetTop;
        x+=8;
        jet.style.top = y +"px";
        jet.style.left = x +"px";
		console.log("Droite");
    }
    else if(event.which == 97){
        var jet = document.getElementById("vaisseau");
        var x = document.getElementById("vaisseau").offsetLeft;
        var y =	document.getElementById("vaisseau").offsetTop;
        x -= 8;	
        jet.style.top = y +"px";
        jet.style.left = x +"px";
		console.log("Gauche");
    }
    else if(event.which == 119){
        var jet = document.getElementById("vaisseau");
        var x = document.getElementById("vaisseau").offsetLeft;
        var y =	document.getElementById("vaisseau").offsetTop;
        y -= 8;
        jet.style.top = y +"px";
        jet.style.left = x +"px";
		console.log("Haut");
    }
    else if(event.which == 115){
        var jet = document.getElementById("vaisseau");
        var x = document.getElementById("vaisseau").offsetLeft;
        var y =	document.getElementById("vaisseau").offsetTop;
        y += 8;
        jet.style.top = y +"px";
        jet.style.left = x +"px";
		console.log("Bas");
    }
	else if (event.which == 102) {
		listeMissile.push(new Missile());
		console.log("FIRE !");
	}
}