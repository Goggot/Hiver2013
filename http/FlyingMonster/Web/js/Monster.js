// À compléter ici
var mouseX=0;
var mouseY=0;

var MonsterList = new Array();

window.onload = function() {
    var nbrMonstre=9;
    for (var i=0; i < nbrMonstre; i++) {
        MonsterList.push(new Monster("monster"+i));
    }
    tick();
}

function tick() {
    for (var i=0; i < MonsterList.length; i++){
        MonsterList[i].tick();
    }
    setTimeout(tick,30);
}

function Monster(id) {
    this.div = document.getElementById(id);
    this.y = this.div.offsetTop;
    this.x = this.div.offsetLeft;
    this.speed = 1;
    this.Yfactor = 1;
    this.Xfactor = 1;
    
    this.tick = function (){
        var angle = getElementAngle(this.x,this.y,mouseX,mouseY);
        rotateElement(this.div,angle);
        
        if (this.y <= (mouseY-10)){
            if ((this.y-mouseY) <= 2){
                this.Yfactor+=0.3;
                this.speed = -this.speed/4;
            }
            else {
                this.Yfactor += 0.5;
            }
        }
        
        if (this.x <= (mouseX-10)){
            if ((this.x-mouseX) <= 2){
                this.Xfactor+=0.3;
                this.speed = -this.speed/4;
            }
            else {
                this.Xfactor += 0.5;
            }
        }
        
        if (this.y >= (mouseY+10)) {
            if ((this.y-mouseY) <= 2){
                this.Yfactor+=0.3;
                this.speed = -this.speed/4;
            }
            else {
                this.Yfactor -= 0.5;
            }
        }
        
        if (this.x >= (mouseX+10)) {
            if ((this.x-mouseX) <= 2){
                this.Xfactor+=0.3;
                this.speed = -this.speed/4;
            }
            else {
                this.Xfactor -= 0.5;
            }
        }
        
        if (this.Xfactor > 15 || this.Yfactor > 15) {
            this.Xfactor-=5;
            this.Yfactor-=5;
        }
        
        this.x+=this.speed+this.Xfactor;
        this.y+=this.speed+this.Yfactor;
        this.div.style.top = this.y+"px";
        this.div.style.left = this.x+"px";
        
        //console.log(mouseY + " - " + mouseX + " - " + this.angle);
    }
}

// Méthode appelé à chaque mouvement de souris
// Le event contient des informations sur la position
// de la souris. À utiliser avec les fonctions getMousePositionX/Y

function follow(event) {
    mouseX = getMousePositionX(event);
    mouseY = getMousePositionY(event);
}