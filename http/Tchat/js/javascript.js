var textXSS = null;

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
						var msgPerso = "Incoming Injection : ";
						if (script >= 0 && php < 0)
							msgPerso = "Incoming XSS Injection : ";
						else if (script < 0 && php >= 0)
							msgPerso = "Incoming PHP Injection : ";
						
						console.log("Script détecté");
						textXSS = msgPerso + message;
						setTimeout(envoieMessage, 500);
						message = escape(message);
					}
				send = send + val.nomUsager + " -- " + message + "</br>";
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
		textXSS = message;
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
