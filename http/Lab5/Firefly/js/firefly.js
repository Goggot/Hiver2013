var listeEtoile = new Array();
var listeEnterprise = new Array();
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
    
    this.bullets = new Array();
    /*for(var i = 0; i < 200; i++){
        this.bullets.push(new Amo(i));
    }*/
}

function Enterprise(){
    this.tick = function() {
        
    }
}

function Etoiles(){
    this.speed = Math.random() * 1;
    this.x = Math.random()*725+145;
    this.y = Math.random()*35;
    this.taille = Math.random() * 2 + 1;
    this.valid = false;
    this.ecran = document.getElementById("jeu");
    this.etoile = document.createElement("div");
    this.etoile.setAttribute("class","etoile");
    
    this.etoile.style.height = this.taille+"px";
    this.etoile.style.width = this.taille+"px";
    
    this.etoile.style.top = this.y+"px";
    this.etoile.style.left = this.x+"px";
    
    this.ecran.appendChild(this.etoile);
    
    this.tick = function(i) {
        this.y += this.speed;
        this.etoile.style.top = this.y+"px";
        
        if (this.y > 490){
            listeEtoile.splice(i,1);
            this.ecran.removeChild(this.etoile);
        }
    }
}

function GameOver() {
    
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
    listeEtoile.push(new Etoiles());
    for (var i=0; i < listeEtoile.length; i++){
        listeEtoile[i].tick(i);
    }
    
    /*for (var i=0; i < listeEnterprise.length; i++){
        listeEnterprise[i].tick();
        if (listeEnterprise[i].offsetTop < 0){
                listeEnterprise.slice(i,1);
        }
        else if (listeEnterprise[i].offsetTop > 600){
            valid=false;
            GameOver();
        }
    }*/
    
    setTimeout(tick,30);
}

function keyPressed(event)
{
    console.log(event);
    if(event.keyCode == 13)
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
    if(event.keycode == 39){
        var jet = document.getElementById("vaisseau"); 
        var x = document.getElementById("vaisseau").offsetLeft;
        var y =	document.getElementById("vaisseau").offsetTop;
        x+=8;
        jet.style.top = y +"px"; 
        jet.style.left = x+"px";
    }
    if(event.keyCode == 37){
        var jet = document.getElementById("vaisseau"); 
        var x = document.getElementById("vaisseau").offsetLeft;
        var y =	document.getElementById("vaisseau").offsetTop;
        x -= 8;	
        jet.style.top = y +"px"; 
        jet.style.left = x+"px";
    }
    if(event.keyCode == 38){
        var jet = document.getElementById("vaisseau"); 
        var x = document.getElementById("vaisseau").offsetLeft;
        var y =	document.getElementById("vaisseau").offsetTop;
        y -= 8;
        jet.style.top = y +"px"; 
        jet.style.left = x+"px";
    }
    if(event.keyCode == 40){
        var jet = document.getElementById("vaisseau"); 
        var x = document.getElementById("vaisseau").offsetLeft;
        var y =	document.getElementById("vaisseau").offsetTop;
        y += 8;
        jet.style.top = y +"px"; 
        jet.style.left = x+"px";	
    }
}