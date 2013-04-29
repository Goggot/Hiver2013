var global;

document.onload = function(){
	tick();
}

function tick(){
	setTimeout(tick,30);
}

document.onkeypress = function(event){
	var key = event;
}
