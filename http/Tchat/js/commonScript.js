var textXSS = null;
var theme = 2;
var tempsAudio = 75000;
var regis= 0;
var widthDivide = window.innerWidth/2, heightDivide = window.innerHeight/2;

function play() {
	setTimeout(play,tempsAudio);
 	document.getElementById('audio').play();
 	console.log("Play");
}

function register() {
	var pseudo = $('#pseudo').val();
	var nom = $('#nom').val();
	var prenom = $('#prenom').val();
	var matricule = $('#matricule').val();
	var password = $('#password').val();
	
	$.ajax({
		url: 'ajax.php',
		type: 'POST',
		data: 'pseudo=' + pseudo + '&nom=' +nom + '&prenom=' + prenom + '&matricule=' + matricule + '&password=' + password,
		success: function(data){
			console.log('erreur...' + data);
			document.getElementById('reponseRegister').innerHTML = data;
			if (data == "Succès !") {
				setTimeout(fenetreMembre, 1000);
			}
		}
	});
}

function fenetreMembre() {
	if (regis == 0) {
		$('.register').fadeIn('normal');
		regis = 1;
	}
	else {
		$('.register').fadeOut('normal');
		regis = 0;
		setTimeout(function(){
			document.getElementById('pseudo').value = '';
			document.getElementById('nom').value = '';
			document.getElementById('prenom').value = '';
			document.getElementById('matricule').value = '';
			document.getElementById('password').value = '';
			document.getElementById('reponseRegister').innerHTML = '';
		},1000);
	}
}

function verifierMessages() {
	$.ajax({
		url: 'ajax.php',
		success: function(data){
			var tab = JSON.parse(data);
			var send = "";
			
			$.each(tab, function(i,val){
				var date = new Date();
				var heure = date.getHours() + ":" + date.getMinutes();
				
				if ($('#jstheme').attr('src') == "js/anim3D.js") {
					if (tab != [] && val.nomUsager != "ChatRoom") {
						morph();
					}
				}
				else if ($('#jstheme').attr('src') == "js/theme3.js"){
					recenter(widthDivide, heightDivide);
				}
				else if ($('#jstheme').attr('src') == "js/tinktank.js") {
					react();
				}
				if (val.nomUsager != "" && val.message != ""){
					var message = val.message;
					var nom = val.nomUsager;
					var sc = message.search("<");
					var scNom = nom.search("<");
					var php = message.search("<?php");
					var script = message.search("<script");
					var uni1 = message.search("&#139;script");
					var uni2 = message.search("&lt;script");
					var meta = message.search("<META HTTP-EQUIV='refresh'");
					
					if (script >= 0 || scNom >= 0 || php >= 0 || sc >=0 || uni1 >= 0 || uni2 >= 0 || meta >= 0)
						if (val.nomUsager != "Pouet" && val.nomUsager != "ChatRoom"){
							if (script >= 0 || scNom >= 0 || sc >= 0 )
								msgPerso = "Incoming XSS Injection : ";
							else if (php >= 0)
								msgPerso = "Incoming PHP Injection : ";
							else if (meta >= 0)
								msgPerso = "Incoming META Injection : ";
							else if (uni1 >= 0 || uni2 >= 0)
								msgPerso = "Incoming UNICODE Injection : ";
							else {
								msgPerso = null;
								document.getElementById('messages').innerHTML = 
												document.getElementById('messages').innerHTML 
																+ "Incoming Unknown Injection!"+"</br>";
							}
							console.log("Script détecté");
							if (msgPerso != null){
								if ($('#jstheme').attr('src') == "js/anim3D.js") {
									if (tab != [] && val.nomUsager != "ChatRoom") {
										morph('XSS');
									}
								}
								textXSS = msgPerso + message;
								setTimeout(envoieMessage, 1000);
							}
							message = escape(message);
						}
					send += heure + " -- <b style='color:red;'> < " + val.nomUsager + " ></b> " + message + "</br>";
				}
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
		url: 'ajax.php',
		type: 'POST',
		data: 'getMember=1',
		success: function(data) {
			var tab = JSON.parse(data);
			var liste = "";

			for (var i=0; i<tab.length; i++) {
				var nom = tab[i];
				var sc = tab[i].search("<");
				if (sc >= 0)
					nom = escape(tab[i]);
				liste = liste + (nom+"</br>");
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
		url: 'ajax.php',
		type: 'POST',
		data: 'message='+message
	});

	var meta1 = message.search('<');
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