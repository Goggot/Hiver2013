
var ballList = new Array();

window.onload = function(){
    for (var i=0; i < 10; i++){
        ballList.push(new Ball("ball_"+i));
    }
    tick();
}

function tick() {
    for (var i=0; i < ballList.length; i++){
        ballList[i].tick();
    }
    setTimeout(tick,30);
}

function Ball(id) {
    this.div = document.getElementById(id);
    this.div.style.left = (Math.random()*400)+"px";
    this.y=10;
    this.speed=0;
    this.Yfactor = 0.4;
    this.Xfactor = 0.3;
    
    this.tick = function (){
        var offsetTop = this.div.offsetTop;
        this.speed += this.Yfactor;
        
        if (offsetTop >= 220){
            this.speed= -this.speed/2;
            offsetTop=220;
            
            if (-this.speed < 1){
                this.speed=0;
                this.Yfactor=0;
            }
        }
        
        offsetTop += this.speed;
        this.div.style.top = offsetTop+"px";
    }
}