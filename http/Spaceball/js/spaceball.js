
var listCube = new Array();
var ctx = null;

window.onload = function () {
    ctx = document.getElementById("canvas").getContext("2d");
    listCube.push(new loadImg());
    listCube.push(new Ball());
    
    for (var i = 0; i < 20; i++){
        listCube.push(new Cube(i*70+10));
    }
    listCube.push(new CubeFin(1410));
    tick();
}

function tick(){
    ctx.clearRect(0,0,500,450);
    for (var i = 0; i < listCube.length; i++) {
        listCube[i].tick();
    }
    window.onkeydown = bouge;
    window.onkeyup = bougePas;
    setTimeout(tick,30);
}

function Cube(x){
    this.size=60;
    this.y=380;
    this.x=x;
    
    this.tick = function(){
        ctx.fillStyle = "rgba(0, 0, 255, 0.7)";
        ctx.fillRect(this.x, this.y, this.size, this.size);
    }
}

function CubeFin(x) {
    this.size=120;
    this.y=380;
    this.x=x;
    
    this.tick = function(){
        ctx.fillStyle = "rgba(255, 0, 0, 0.7)";
        ctx.fillRect(this.x, this.y, this.size, this.size);
    }
}

function loadImg(){
    this.showImage = false;
    this.image=new Image();
    var sprite = this;
    this.image.onload = function() {
            sprite.showImage = true;
    }
    
    this.image.src="img/space.jpg";
    
    this.tick = function(){
        if (this.showImage) {
            ctx.drawImage(this.image, 0, 0);
        }
        return false;
    }
}

function Ball(){
    this.size=10;
    this.over = false;
    this.saut = false;
    this.x=50;
    this.y=10;
    this.speed=5;
    this.KeyFactor = 1;
    this.Yfactor = 0.3;
    this.Xfactor = 0.3;
    
    this.tick = function(){
        if (!this.over) {
            this.speed+=this.Yfactor;
            
            if (this.y > 368){
                var valid = false;
                if (this.saut){
                    this.saut = false;
                }
                for (var i = 0; i < listCube.length; i++){
                    if (this.x > listCube[i].x && this.x < ((listCube[i].x)+60)){
                        valid=true;
                        break;
                    }
                }
                if (valid){
                    this.speed = -this.speed/2;
                    if (this.KeyFactor <= 1 && this.KeyFactor >= 0){
                        this.KeyFactor = 0;
                    }
                }
            }
            
            if (this.x > 300){
                
            }
            
            if (this.x < 200) {
                
            }
            
            if (this.y > 375){
                this.xFactor = 0;
                this.KeyFactor = 0;
                this.speed += 0.8;
                this.over = true;
            }
            
            if (this.KeyFactor > 10){
                this.KeyFactor = 8;
            }
            
            this.y += this.speed;
            this.x += this.KeyFactor;
            
            ctx.fillStyle="yellow";
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, 2*Math.PI,true);
            ctx.fill();
            console.log("Rien n'est perdu !");
        }
        else {  // PERDU !
            if (this.y < 450){
                this.y += this.speed;
                ctx.fillStyle="yellow";
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, 2*Math.PI,true);
                ctx.fill();
                console.log("Perdu...");
            }
        }
    }
}

function bouge(event){
    console.log(event);
    if (event.keyCode == 39){
        listCube[1].KeyFactor = 2;
        setTimeout(listCube[1].tick(),1000);
        listCube[1].KeyFactor = 4;
    }
    else if (event.keyCode == 37){
        listCube[1].KeyFactor = 2;
        setTimeout(listCube[1].tick(),1000);
        listCube[1].KeyFactor = -4;
    }
    else if (event.keyCode == 32){
        if (!listCube[1].saut && listCube[1].y > 350){
            listCube[1].speed = 15;
            listCube[1].saut = true;
        }
    }
}

function bougePas(event){
    console.log(event);
    if (event.keyCode == 39){
        listCube[1].KeyFactor = 3;
    }
    else if (event.keyCode == 37){
        listCube[1].KeyFactor = -3;
    }
}