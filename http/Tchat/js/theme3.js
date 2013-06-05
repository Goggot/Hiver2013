var matrix = new Array();
var center = 0;
var SCREEN_WIDTH = window.innerWidth, SCREEN_HEIGHT = window.innerHeight;

window.onload = function(){
	$('#main').fadeIn("slow");
	$('#footer').fadeIn("slow");
	$('#connection').animate({top: SCREEN_HEIGHT/3},"slow");
	$('#connection').animate({left: SCREEN_WIDTH/3},"slow");
	$('#footer').animate({top: SCREEN_HEIGHT-50},"slow");
	$('#footer').animate({left: SCREEN_WIDTH/3},"slow");
	$('#text').animate({height: SCREEN_HEIGHT-200},"slow");
	$('#text').animate({width: SCREEN_WIDTH-500},"slow");
	$('#liste').animate({left: SCREEN_WIDTH/1.3},"slow");
	init();
	tick();
}

function init() {
	for (var i = 0; i < 150; i++) {
		matrix[i] = new points(i);
	}
}

function tick() {
	for (var i = 0; i < matrix.length; i++) {
		matrix[i].tick(i);
	}
	document.onclick = function(event){recenter(event.pageX, event.pageY);};
	setTimeout(tick,300);
}

function recenter(width, height) {
	if (center == 0) {
		for (var i = 0; i < matrix.length; i++) {
			$('#'+i).animate({left: width},"slow");
			$('#'+i).animate({top: height},"slow");
		}
		center = 1;
	}
	else{
		for (var i = 0; i < matrix.length; i++) {
			$('#'+i).animate({top: height},"slow");
			$('#'+i).animate({left: width},"slow");
		}
		center = 0;
	}
	
}

function points(id) {
	this.choix = Math.random() * 100;
	this.pts = document.createElement('div');
	this.pts.setAttribute('class', 'point');
	this.pts.setAttribute('id', id);
	
	this.pts.setAttribute('style', 'left:'+SCREEN_WIDTH/2+'px; top:'+SCREEN_HEIGHT/2+'px;');
	
	$('body').append(this.pts);
	
	this.tick = function(id) {
		this.choix = Math.random() * 100;
		
		if (this.choix <= 25) {			// Direction : Haut
			$('#'+id).animate({top: '+=25'},"fast");
		}
		else if (this.choix > 25 && this.choix <= 50) {	// Direction : Bas
			$('#'+id).animate({top: '-=25'},"fast");
		}
		else if (this.choix > 50 && this.choix <= 75) {	// Direction : Gauche
			$('#'+id).animate({left: '+=25'},"fast");
		}
		else{	// Direction : Droite
			$('#'+id).animate({left: '-=25'},"fast");
		}
		
		if ( ($('#'+id).offset().top < 0) || ($('#'+id).offset().top > 1000) || ($('#'+id).offset().left < 0) || ($('#'+id).offset().left > 1200 )) {
			$('#'+id).animate({left: '700'},"slow");
			$('#'+id).animate({top: '380'},"slow");
		}
	}
}