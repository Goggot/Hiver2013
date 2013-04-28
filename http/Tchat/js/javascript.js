function verifierMessages() {
	$.ajax({
		url: 'getMessages.php',
		success: function(data){
			console.log(JSON.parse(data));
			console.log(data);
			document.getElementById('messages').innerHTML = JSON.parse(data);
			setTimeout(verifierMessages, 3000);
		}
	});
}

function verifierMembres() {
	$.ajax({
		url: 'getMembres.php',
		success: function(data) {
			console.log(JSON.parse(data));
			document.getElementById('membres').innerHTML = JSON.parse(data);
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
	document.getElementById('conv').innerHTML = " ";
}