function verifierMessages() {
	$.ajax({
		url: 'getMessages.php',
		success: function(data){
			var tab = JSON.parse(data);
			
			var msg = "";
			
			$.each(tab, function(i,val){
				msg = msg + val.nomUsager + " --> " + val.message + "</br>";
			});
			
			document.getElementById('messages').innerHTML = document.getElementById('messages').innerHTML + msg;
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
	var message = $('#conv').val();

	$.ajax({
		url: 'envoieMessage.php',
		type: 'POST',
		data: 'message='+message
	});
	
	document.getElementById('conv').value = '';
	var text = document.getElementById('text');
	text.scrollTop = text.scrollHeight;
	document.getElementById('messages').innerHTML = document.getElementById('messages').innerHTML + " --> " + message + "</br>";
}

function texte(event){
	if (event.keyCode == 13) {
            envoieMessage();
        };
}