
/*
 * Le fantôme ne doit pas disparaitre du canvas, même en parti.
 */ 
 var fantomeImg = new Image();
 var xg = 300;
 var direction = 'G';
 
window.onload = function initFantome() {
	ctx = document.getElementById("ghostCanvas").getContext("2d");
	fantomeImg.onload = function () {fantome();}
	fantomeImg.src = "images/ghost.png";
	tick();
}

function tick() {
	if (xg <= 2){
		direction = 'D';
	}
	else if (xg >= 590){
		direction = 'G';
	}
	
	if (direction == 'G'){
		xg -= 2;
	}
	else {
		xg += 2;
	}
	fantome();
	setTimeout(tick,20);
}

function fantome() {
	ctx.clearRect(0,0,700,300);
	ctx.drawImage(fantomeImg,xg,100,107,109);
}