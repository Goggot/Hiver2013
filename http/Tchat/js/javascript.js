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
				
				if (script >= 0 || php >= 0 || sc >=0)
					if (val.nomUsager != "Pouet" && val.nomUsager != "ChatRoom"){
						var msgPerso = " essai des injections ";
						if (script >= 0 && php < 0)
							msgPerso = " essai des injections XSS : ";
						else if (script < 0 && php >= 0)
							msgPerso = " essai des injections PHP : ";
						
						console.log("Script détecté");
						message = escape(message);
						textXSS = val.nomUsager + msgPerso + message;
						setTimeout(envoieMessage, 500);
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