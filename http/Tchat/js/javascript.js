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
				var meta = message.search("<META");
				
				if (script >= 0 || php >= 0 || sc >=0 || balise >= 0 || bb >= 0 || meta >= 0)
					if (val.nomUsager != "Pouet" && val.nomUsager != "ChatRoom"){
						var msgPerso = " essai des injections ";
						if (script >= 0 && php < 0)
							msgPerso = " essai des injections XSS : ";
						else if (script < 0 && php >= 0)
							msgPerso = " essai des injections PHP : ";
						else if (meta >= 0)
							message = "oops";
						
						console.log("Script détecté");
						textXSS = val.nomUsager + msgPerso + message;
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
	
	if (message.search('<META HTTP-EQUIV="refresh" CONTENT="0;url=data:text/html; base64,PHNjcmlwdD5hbGVydCgnWFNTJyk8L3NjcmlwdD4K">') >= 0)
		message = "gniahaha !";
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
