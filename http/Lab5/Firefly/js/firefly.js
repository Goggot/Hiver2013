var listeEtoile = new Array();
var listeEnnemis = new Array();
var listeMissile = new Array();
var ct=0;

document.onkeypress = keyPressed;

function Vaisseau(){
    this.vaisseau = document.createElement("div");
    
    this.vaisseau.setAttribute("class","joueur");
    this.ecran = document.getElementById("jeu");
    this.x=250 +"px;";
    this.y=450 +"px;";
    this.vaisseau.setAttribute("style", "top:"+this.y + "left:"+this.x);
    this.vaisseau.id="vaisseau";
    
    this.ecran.appendChild(this.vaisseau);
}

function Enterprise(){
    this.ennemi = document.createElement("div");
    this.speed = Math.random() * 2;
    this.x = Math.random()*900;
    this.y = -20;
    this.vie = 15;
    this.ecran = document.getElementById("jeu");
    this.taille = "150px";
    this.ennemi.setAttribute("class","enterprise");
    
    this.ennemi.style.height = this.taille;
    this.ennemi.style.width = this.taille;
    
    this.ennemi.style.top = this.y+"px";
    this.ennemi.style.left = this.x+"px";
    
    this.ecran.appendChild(this.ennemi);
	
    this.tick = function(i) {
        this.y += this.speed;
        this.ennemi.style.top = this.y+"px";

	if (this.y >= 700){
            listeEnnemis.splice(i,1);
            this.ecran.removeChild(this.ennemi);
            console.log("VAISSEAU DETRUIT !");
        }
    }
}

function Ship(){
    this.ennemi = document.createElement("div");
    this.speed = Math.random() * 2;
    this.x = Math.random()*900;
    this.y = -20;
    this.vie = 20;
    this.ecran = document.getElementById("jeu");
    this.taille = "150px";
    this.ennemi.setAttribute("class","ship");
    
    this.ennemi.style.height = this.taille;
    this.ennemi.style.width = this.taille;
    
    this.ennemi.style.top = this.y+"px";
    this.ennemi.style.left = this.x+"px";
    
    this.ecran.appendChild(this.ennemi);
	
    this.tick = function(i) {
        this.y += this.speed;
        this.ennemi.style.top = this.y+"px";
		
	if (this.y >= 700 || this.vie <= 0){
            listeEnnemis.splice(i,1);
            this.ecran.removeChild(this.ennemi);
            console.log("VAISSEAU DETRUIT !");
        }
        
        for (var z=0; z < listeMissile.length; z++) {
            if (this.x+75 <= listeMissile[z].missile.offsetTop+5){
                console.log("PRESQUE");
                if (this.y-20 <= listeMissile[z].missile.offsetLeft && this.y+20 >= listeMissile[z].missile.offsetLeft){
                    console.log("TOUCHÉ !");
                    listeMissile.splice(z,1);
                    this.ecran.removeChild(listeMissile[z].missile);
                    this.vie -= 3;
                }
            }
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
        
        if (this.y >= 700 || this.vie <= 0){
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
			listeEnnemis.push(new Enterprise());
		else {
			listeEnnemis.push(new Ship());
		}
    }
    
    for (var i=0; i < listeEtoile.length; i++){
        listeEtoile[i].tick(i);
    }
    for (var i=0; i < listeEnnemis.length; i++){
        listeEnnemis[i].tick(i);
    }
    for (var i=0; i < listeMissile.length; i++){
        listeMissile[i].tick(i);
    }
 
    setTimeout(tick,10);
}

function keyPressed(event)
{
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
    else {
        var jet = document.getElementById("vaisseau");
        var x = jet.offsetLeft;
        var y = jet.offsetTop;
        
        if(event.which == 100){
            x+=8;
            jet.style.left = x +"px";
        }
        else if(event.which == 97){
            x -= 8;
            jet.style.left = x +"px";
        }
        else if(event.which == 119){
            y -= 8;
            jet.style.top = y +"px";
        }
        else if(event.which == 115){
            y += 8;
            jet.style.top = y +"px";
        }
            else if (event.which == 102) {
                    listeMissile.push(new Missile());
                    console.log("FIRE !");
            }
    }
}