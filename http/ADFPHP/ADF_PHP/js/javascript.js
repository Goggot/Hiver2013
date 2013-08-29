var passwdHidden = true;
var registerHidden = true;
var researchHidden = true;

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
					if (data == "Mot de passe changé avec succès !")
						setTimeout(fenetrePasswd,1000);
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

function research(){
	var titre = $('#titre').val();
	var date = $('#date').val();
	var langue = $('#langue').val();

	$.ajax({
			url: 'ajax.php',
			type: 'POST',
			data: 'titre='+ titre + '&date=' + date + '&langue='+ langue,
			success: function(data){
				console.log(data);
				var titre;
				var noatel; 
				var duree;
				data  = JSON.parse(data);
				/*$.each(data, function(i,val){
					console.log(val);
					titre =  val.TITRE;
					noatel = val.NOATEL;
					duree = val.DATEATEL;
					document.getElementById('reponseResearch').innerHTML = data[]+ " " + noatel +" " + duree + "</br>";
				});*/
				document.getElementById('reponseResearch').innerHTML = data["TITRE"]+ " " + data["NOATEL"] +" " + data["DATEATEL"] + "</br>";
			}
		});
}

function fenetrePasswd(){
	if (passwdHidden){
		$(".changePasswd").fadeIn("normal");
		passwdHidden = false;
	}
	else{
		$(".changePasswd").fadeOut("slow");
		passwdHidden = true;
		document.getElementById('reponseMDP').innerHTML = "";
		document.getElementById('aMdp').value = "";
		document.getElementById('nMdp').value = "";
		document.getElementById('rMdp').value = "";
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

function fenetreResearch(){
	if (researchHidden){
		$(".research").fadeIn("normal");
		registerHidden = false;
	}
	else{
		$(".research").fadeOut("slow");
		researchHidden = true;
		document.getElementById('reponseReasearch').innerHTML = "";
	}
}