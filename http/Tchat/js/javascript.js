function verifierMessages() {
	$.ajax({
		url: 'getMessages.php',
		success: function(data){
			var tab = JSON.parse(data);
			var nom;
			var msg;
			$.each(tab,function(i,val){
				nom = val.nomUsager;
				msg = val.message;
			});
			if (tab != "") {
				document.getElementById('messages').innerHTML = document.getElementById('messages').innerHTML + nom + " --> " + msg + "</br>";
			}
			setTimeout(verifierMessages, 3000);
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
			setTimeout(verifierMembres, 3000);
		}
	});
}

function envoieMessage(){
	console.log("Envoie en cours...");
	var message = $('#conv').val();
	console.log(message);
	$.ajax({
		url: 'envoieMessage.php',
		type: 'POST',
		data: 'message='+message
	});
	console.log("Envoie terminé...");
	document.getElementById('messages').innerHTML = document.getElementById('messages').innerHTML + " --> " + message + "</br>";
	document.getElementById('conv').innerHTML = "";
}