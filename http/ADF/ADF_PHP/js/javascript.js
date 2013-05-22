var passwdHidden = true;
var registerHidden = true;

function changePassword(){
	var aMdp = $('#aMdp').val();
	var nMdp = $('#nMdp').val();
	var rMdp = $('#rMdp').val();

	if ((aMdp && nMdp && rMdp) && (nMdp == rMdp))
		if (nMdp.length <= 7)
			$.ajax({
				url: 'ajax.php',
				type: 'POST',
				data: 'aMdp='+ aMdp + '&nMdp=' + nMdp,
				success: function(data){
					document.getElementById('reponseMDP').innerHTML = data;
				}
			});
		else
			document.getElementById('reponseMDP').innerHTML = "Nouveau mot de passe trop long";
}

function register(){
	var codeauditeur = $('#codeauditeur').val();
	var nom = $('#nom').val();
	var prenom = $('#prenom').val();
	var password = $('#passwordRe').val();
	var juge = $('#juge').val();
	var statut = $('#statut').val();
	var candidatjuge = $('#candidatjuge').val();
	var admin = $('#admin').val();
	var rue = $('#rue').val();
	var ville = $('#ville').val();
	var codepostal = $('#codepostal').val();
	var noregion = $('#noregion').val();
	var telephone = $('#telephone').val();
	var cell = $('#cell').val();
	var courriel = $('#courriel').val();
	console.log(password);
	if (password.length <= 7 && codepostal.length <= 6)
		$.ajax({
			url: 'ajax.php',
			type: 'POST',
			data: 'codeauditeur='+ codeauditeur + '&nom=' + nom + '&prenom='+ prenom + '&password=' + password + 
				'&juge='+ juge + '&candidatjuge=' + candidatjuge + '&statut='+ statut + '&admin=' + admin + 
				'&rue='+ rue + '&ville=' + ville + '&codepostal='+ codepostal + '&noregion=' + noregion + 
				'&telephone='+ telephone + '&cell=' + cell + '&courriel=' + courriel,
			success: function(data){
				document.getElementById('reponseRegister').innerHTML = data;
			}
		});
	else
		document.getElementById('reponseRegister').innerHTML = "Mot de passe ou code postal trop long";
}

function fenetrePasswd(){
	if (passwdHidden){
		$(".changePasswd").fadeIn("normal");
		passwdHidden = false;
	}
	else{
		$(".changePasswd").fadeOut("normal");
		passwdHidden = true;
		document.getElementById('reponseMDP').innerHTML = "";
	}
}

function fenetreRegister(){
	if (registerHidden){
		$(".register").fadeIn("normal");
		registerHidden = false;
	}
	else{
		$(".register").fadeOut("normal");
		registerHidden = true;
		document.getElementById('reponseRegister').innerHTML = "";
	}
}