var infos = false;
var load = false;

window.onload = function(){
	$("#left").fadeIn("normal");
}

function infosPHP(){
	if (load == false){
		load = true;
		$.ajax({
			url: 'localhost/ajax.php',
			success: function(data){
				console.log("reussi");
				document.getElementById('infos').innerHTML = data;
			}
		});
		$("#infos").fadeIn("normal");
	}
	else if(infos == false){
		$("#infos").fadeIn("normal");
		infos = true;
	}
	else{
		$("#infos").fadeOut("normal");
		infos = false;
	}
}