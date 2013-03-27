var ballList = new Array();

// Au chargement de la page, on appelle tick() 
// (on démarre l'animation)
window.onload = function () {
	for (var i = 1; i <= 10; i++) {
		ballList.push(new Ball("ball_" + i));
	}
	
	tick();
}

function tick() {
	for (var i = 0; i < ballList.length; i++) {
		ballList[i].tick();
	}
	
	setTimeout(tick, 30);
}

function Ball(id) {
	this.div = document.getElementById(id);
	this.div.style.top =  (Math.random() * 20) + "px";
	this.div.style.left = (Math.random() * 400) + "px";
	this.speed = 0;
	this.yFactor = 0.3;

	this.tick = function () {
		var offsetTop = this.div.offsetTop;
		this.speed += this.yFactor;
		offsetTop += this.speed;
		
		if (offsetTop >= 220) {
			this.speed = -this.speed/1.8;
			offsetTop = 220;
			
			if (-this.speed < 1.3) {
				this.speed = 0;
				this.yFactor = 0;
			}
		}
		
		this.div.style.top = offsetTop + "px";
		
	}
}








