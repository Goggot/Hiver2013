window.onload = function() {
	$("h1").fadeIn(2000,menu);
}
var i = 1;
function menu(){
	if (i <= 7){
		$("#item"+i).slideDown(700,menu);
		i++;
	}
	console.log("Fonction menu");
}