
var spriteList = new Array();
var ctx = null;

window.onload = function() {
    ctx = document.getElementById("canvas").getContext("2d");
    
    spriteList.push(new BackgroundSprite());
    
    tick();
}

function tick() {
    for (var i = 0; i < spriteList.length; i++) {
        var aSupprimer = spriteList[i].tick();  // verification si c'est mort ou pas
        
        if (aSupprimer) {
            spriteList.splice(i,1);
            i--;
        }
    }
    
    if (Math.random() < 0.3){
        spriteList.push(new Drop());
    }
    
    setTimeout(tick,30);
}

function BackgroundSprite() {
    this.showImage = false;             // stat si l'image est chargee en memoire ou pas
    this.image = new Image();           // creation de l'objet image
    var sprite = this;                  // affectation a une variable temporaire
    this.image.onload = function() {
            sprite.showImage = true;
    }
    
    this.image.src="images/landscape.png";
    
    this.tick = function() {
        if (this.showImage) {
            ctx.drawImage(this.image, 0, 0);
        }
        return false;
    }
}

function Drop() {
    this.size = 4;
    this.y=-10;
    this.x=Math.random()*500;
    
    this.tick = function() {
        this.y+=50;
        ctx.fillStyle = "blue";
        ctx.fillRect(this.x, this.y, this.size, this.size+4);
        
        return this.y > 300;    // Si y vaut plus de 300, return true
    }
}