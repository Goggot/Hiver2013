var textXSS = null;
var temps = 30000;

window.onload = function(){
	$('#main').fadeIn("slow");
	$('#footer').fadeIn("slow");
	animateLeft();
	animateRight();
}

function animateLeft(){
	$('#animLeftAccueil1').transition({rotate: '-500deg'},temps);
	$('#animLeftAccueil1').transition({rotate: '500deg'},temps);


	$('#animLeftTchat1').transition({rotate: '-500deg'},temps);
	$('#animLeftTchat1').transition({rotate: '500deg'},temps);

	$('#animLeftTchat2').transition({rotate: '800deg'},temps);
	$('#animLeftTchat2').transition({rotate: '-800deg'},temps);

	$('#animLeftTchat3').transition({rotate: '-600deg'},temps);
	$('#animLeftTchat3').transition({rotate: '600deg'},temps);

	$('#animLeftTchat4').transition({rotate: '500deg'},temps);
	$('#animLeftTchat4').transition({rotate: '-500deg'},temps);

	$('#animLeftTchat5').transition({rotate: '-500deg'},temps);
	$('#animLeftTchat5').transition({rotate: '500deg'},temps);

	$('#animLeftTchat6').transition({rotate: '500deg'},temps);
	$('#animLeftTchat6').transition({rotate: '-500deg'},temps);

	setTimeout(animateLeft, 10000);
}


function animateRight(){
	$('#animRightAccueil1').transition({rotate: '500deg'},temps);
	$('#animRightAccueil1').transition({rotate: '-500deg'},temps);


	$('#animRightTchat1').transition({rotate: '500deg'},temps);
	$('#animRightTchat1').transition({rotate: '-500deg'},temps);

	$('#animRightTchat2').transition({rotate: '-800deg'},temps);
	$('#animRightTchat2').transition({rotate: '800deg'},temps);

	$('#animRightTchat3').transition({rotate: '600deg'},temps);
	$('#animRightTchat3').transition({rotate: '-600deg'},temps);

	$('#animRightTchat4').transition({rotate: '-500deg'},temps);
	$('#animRightTchat4').transition({rotate: '500deg'},temps);

	$('#animRightTchat5').transition({rotate: '450deg'},temps);
	$('#animRightTchat5').transition({rotate: '-450deg'},temps);

	$('#animRightTchat6').transition({rotate: '-500deg'},temps);
	$('#animRightTchat6').transition({rotate: '500deg'},temps);

	setTimeout(animateRight, 10000);
}

function verifierMessages() {
	$.ajax({
		url: 'getMessages.php',
		success: function(data){
			var tab = JSON.parse(data);
			var send = "";
			
			$.each(tab, function(i,val){
				var message = val.message;
				var sc = message.search("<");
				var php = message.search("<?php");
				var script = message.search("<script");
				var balise = message.search("&#139;script");
				var bb = message.search("&lt;script");
				var meta = message.search("<META HTTP-EQUIV='refresh'");
				
				if (script >= 0 || php >= 0 || sc >=0 || balise >= 0 || bb >= 0 || meta >= 0)
					if (val.nomUsager != "Pouet" && val.nomUsager != "ChatRoom"){
						if (script >= 0)
							msgPerso = "Incoming XSS Injection : ";
						else if (php >= 0)
							msgPerso = "Incoming PHP Injection : ";
						else if (meta >= 0)
							msgPerso = "Incoming META Injection : ";
						else if (balise >= 0 || bb >= 0)
							msgPerso = "Incoming UNICODE Injection : ";
						else {
							msgPerso = null;
							document.getElementById('messages').innerHTML = 
											document.getElementById('messages').innerHTML 
															+ "Incoming Unknown Injection!"+"</br>";
						}
						console.log("Script détecté");
						if (msgPerso != null){
							textXSS = msgPerso + message;
							setTimeout(envoieMessage, 500);
						}
						message = escape(message);
					}
				send = send + "<b style='color:red;'>" + val.nomUsager + "</b> -- " + message + "</br>";
			});
			
			document.getElementById('messages').innerHTML = document.getElementById('messages').innerHTML + send;
			var text = document.getElementById('text');
			text.scrollTop = text.scrollHeight;
			setTimeout(verifierMessages, 1000);
		}
	});
}

function verifierMembres() {
	$.ajax({
		url: 'getMembres.php',
		success: function(data) {
			var tab = JSON.parse(data);
			var liste = "";
			for (var i=0; i<tab.length; i++) {
				liste = liste + (tab[i]+"</br>");
			}
			document.getElementById('membres').innerHTML = liste;
			setTimeout(verifierMembres, 1000);
		}
	});
}

function envoieMessage(){ 
	console.log("Envoie en cours...");
	var message;
	if (textXSS){
		message = textXSS;
		textXSS = null;
	}
	else{
		message = $('#conv').val();
	}
	
	$.ajax({
		url: 'envoieMessage.php',
		type: 'POST',
		data: 'message='+message
	});
	var meta1 = message.search('<META HTTP-EQUIV="refresh"');
	if (meta1 >= 0){
		message = "gniahaha !";
	}
	document.getElementById('conv').value = '';
	var text = document.getElementById('text');
	text.scrollTop = text.scrollHeight;
	document.getElementById('messages').innerHTML = document.getElementById('messages').innerHTML + " -- " + message + "</br>";
}

function texte(event){
	if (event.keyCode == 13) {
        envoieMessage();
    };
}