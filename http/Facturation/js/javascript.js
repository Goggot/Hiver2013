
/* ---------------------------------------------------
 *					                  
 *    Projet synthèse : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */

var option;
var page; 

 function recover(event){
 	if (event.target.id == "bf"){
 		var mail = $('#mail').val();
 		console.log("Mail en cours...");

 		if (mail != ""){
	 		$.ajax({
	 			url: 'ajax.php',
	 			type: 'POST',
				data: 'email='+mail,
	 			success: function(data){
	 				document.getElementById('resultat').innerHTML = data;
	 			}
	 		});
	 	}
	 	else {
			document.getElementById('resultat').innerHTML = "* Veuillez rentrer une adresse email valide *";
	 	}
 	}
 	else if (event.target.id == "mdpf")
 	{
 		$("#reco_email").fadeIn("fast");
 	}
 }

 function infosRapport(){
 	$("#boxR").fadeOut(90);
 	document.getElementById('boxR').innerHTML = "";
 	noFacture = $('#champNoFacture').val();
 	date = $('#jour').val()+"-"+$('#mois').val()+"-"+$('#annee').val();

 	if (noFacture != ""){
 		console.log("No de Facture rempli");
 		$.ajax({
 			url: 'ajax.php',
 			type: 'POST',
			data: 'noFacture='+noFacture,
 			success: function(data){
 				var facture = null;
 				data = JSON.parse(data);
 				if (data)
	 				for(var key in data){
	 					document.getElementById('boxR').innerHTML += (key + " --> " + data[key] + "</br>");
	 				}
	 			else{
	 				document.getElementById('boxR').innerHTML = "Aucune facture trouvé avec ce numéro...";
	 			}
 			}
 		});
 	}
 	else if (date != "--"){
 		console.log("Date de Facturation rempli");
 		$.ajax({
 			url: 'ajax.php',
 			type: 'POST',
			data: 'dateFacture='+date,
 			success: function(data){
 				var facture = null;
 				if (data){
	 				for(var i = 0; i < data.length; i++){
	 					facture += (data[i]+"</br>");
	 				}
	 			}
	 			else{
	 				document.getElementById('boxR').innerHTML = "Aucune facture trouvé avec ce numéro...";
	 			}

 				document.getElementById('boxR').innerHTML = data;
 			}
 		});
 	}
 	else {
 		document.getElementById('boxR').innerHTML = "Veuillez rentrer un numéro ou une date valide...";
 	}

 	$("#boxR").fadeIn("fast");
 }

 function champVide(event)
 {
 	if (event.target.id == "b_ClientOK")
 	{
 		rafraichir();
 		var id = $('#champIdClient').val();
 		var nom = $('#champNomClient').val();
 		var val; 
 		console.log("vérification de la requête client en cours...");

 		if (id != "" || nom != "")
 		{
 			if(id != "")
 			{
 				console.log("test id passé: requete client");
 				console.log("valeur de l'id" + id);
		 		$.ajax({
		 			url: 'ajax.php',
		 			type: 'POST',
					data: 'id='+ id,
		 			success: function(data){
		 				console.log(data);
		 				data = JSON.parse(data);
		 				var l=1;
		 				if(data)
		 					for(var i in data)
		 					{
		 						document.getElementById('chmp'+l).innerHTML += data[i] + " " ;
		 						l++;
		 					}
		 				else
		 					document.getElementById('reply').innerHTML = "Auncun résultat trouvé" ;
		 			}
		 		});
	 		}
	 		else
	 		{
	 			console.log("test nom passé: requete client");

	 			$.ajax({
		 			url: 'ajax.php',
		 			type: 'POST',
					data: 'nom='+nom,
		 			success: function(data){
		 				console.log(data);
		 				data = JSON.parse(data);
		 				if(data)
		 					for(  var i  in data)
		 						document.getElementById('chmp'+i).innerHTML = data[i] + " " ;
		 				else
		 					document.getElementById('reply').innerHTML =  "Auncun résultat trouvé" ;
		 			}
		 		});
	 		}
	 	}
	 	else
	 	{
	 		console.log("recherche échoué les champs sont vide: requete client");
			document.getElementById('reply').innerHTML = "** Veuillez remplir tous les champs **";
	 	}
 	}
 	else if (event.target.id == "mdpf"){
 		$("#reco_email").fadeIn("fast");
 	}
 }

 function retry(event)
 {
 	 if(event.target.id == "b_ClientRetry")
 	 {
 	 	console.log("TEST -> DANS RETRY()");
 	 	document.getElementById('champIdClient').value="";
 	 	document.getElementById('champNomClient').value="";
 	 	document.getElementById('reply').innerHTML = "";
 	 	rafraichir();
 	 }
 }

 function rafraichir()
 {
 	console.log("TEST -> DANS RAFRAICHIR()");
 		for (var i = 1; i <= 5; i++)
 		{
 			if(document.getElementById('chmp'+ i).innerHTML != "")
 	 		 	document.getElementById('chmp'+ i).innerHTML = ""; 
 	 	}
 }
 
 function verifierChampClient()
 {
 	if( $('#chmpC1').val() != " " && $('#chmpC2').val()  != " " && $('#chmpC3').val()  != " " && $('#chmpC4').val()  != " " && $('#chmpC5').val()  != " " && $('#chmpC6').val()  != " ")
 		return true;
 	else 
 		return false; 
 }
function verifierChampFacture()
 {
 	if( $('#chmpF1').val()  != " " && $('#chmpF2').val()  != " " && $('#chmpF3').val()  != " " && $('#chmpF4').val()  != " " && $('#chmpF5').val()  != " " && $('#chmpF6').val()  != " " && $('#chmpF7').val()  != " " && $('#chmpF8').val()  != " " && $('#chmpF9').val()  != " ")
 		return true;
 	else 
 		return false; 
 }
 function confirmC()
 {
 	var titre = document.getElementById('combo').options[combobox.selectedIndex].text;
	var reponse = $('#inputText').val();


 }

/*function addClient()
{
 	console.log("TEST -> DANS AJOUTER()");
 	//$('#bckg_resultat_CF').fadeOut(100);
 	if( verifierChampClient() == true )
 	{
 		var addclient= 'addclient';
 		var chmp1 = $('#chmpC1').val();
 		var chmp2 = $('#chmpC2').val();
 		var chmp3 = $('#chmpC3').val();
 		var chmp4 = $('#chmpC4').val();
 		var chmp5 = $('#chmpC5').val();
 		var chmp6 = $('#chmpC6').val();
 		$.ajax({
	 			url: 'ajax.php',
	 			type: 'POST',
				data: 'CC='+addclient+'&repC1='+chmp1+'&repC2='+chmp2'&repC3='+chmp3+'&repC4='+chmp4+'&repC5='+chmp5+'&repC6='+chmp6+,
	 			success: function(data)
	 			{
	 				if (data)
	 					console.log("envoyer message REUSSI!"); 
	 			}
	 		});
 	}
 	else
 		console.log("validation des champs non valide");
 }*/

 function dialog( element)
 {
 	
 	option = element; 
 	console.log("TEST dans popup valeur de option" + option );

 	 var tablo= new Array();
   
    var combobox = document.getElementById('combo');
    var champRep = document.getElementById('champRepC');
	var titre = document.getElementById('combo').options[combobox.selectedIndex].text;

    console.log("LOG: création jcomboBox tab = " + tablo);
    console.log("resultat option" + option);
	if( option == "modifier" )
	{
		var input = document.createElement("input");
		input.type="text";
 		input.id="inputText";
 		champRep.appendChild(input);
 		if( page == "client")
 		{
 			tablo = getInfoComboBox();
 			for(var i = 0; i < 5; i++)
	 		{
	 			var option = document.createElement("option");
				option.text=  tablo[i];
				option.value =tablo[i];
				combobox.appendChild(option);
	 		}
 		}
 		else
 		{
 			tablo = getInfoFactureCB();
 			for(var i = 0; i < 12; i++)
	 		{
	 			var option = document.createElement("option");
				option.text=  tablo[i];
				option.value =tablo[i];
				combobox.appendChild(option);
			}
 		}

 		

 	}
  if(option == "supprimer")
 	{
 		 console.log("3 condition " + option);
 		 var ch1 = document.getElementById('jcomboBox');
 		 ch1.text= "Entrez l'ID du client désiré";
 		 var input = document.createElement("input");
		input.type="text";
 		input.id="inputText";
 		champRep.appendChild(input);
 	}


 	$('#boxA').fadeIn('normal');
 
 }

function getInfoComboBox()
{
	var tab = new Array();
	for(var i = 0; i < 5 ; i ++)
	{
	if( i== 0)
	tab[i] = "Id";
	else if(i == 1)
	tab[i]= "Nom";
	else if(i == 2)
		tab[i]= "Username";
	else if(i == 3)
		tab[i]= "Adresse";
	else if(i == 4)
		tab[i]= "Nom de Compagnie";
	}
	return tab;
}
function modifierClient()
{
	var combobox = document.getElementById('combo');
	var titre = document.getElementById('combo').options[combobox.selectedIndex].text;
	var reponse = $('#inputText').val();
	console.log("champ texte formulaire modifierClient(): "+reponse);
	console.log(titre);
		$.ajax({
	 			url: 'ajax.php',
	 			type: 'POST',
				data: 'titre='+ titre + '&rep=' + reponse + '&optionConfig=modifier',
	 			success: function(data)
	 			{
	 				if (data)
	 					console.log("envoyer message modifierClient() REUSSI!"); 
	 			}
	 		});
}
function supprimerClient( event)
{ 
 	var titre = document.getElementById('combo').options[combobox.selectedIndex].text;
 	var reponse = $('#inputText').val();
	console.log("champ texte formulaire supprimerClient(): "+reponse);
	console.log(titre);
		$.ajax({
	 			url: 'ajax.php',
	 			type: 'POST',
				data: 'titre='+ titre + '&rep=' + reponse + '&optionConfig=supprimer',
	 			success: function(data)
	 			{
	 				if (data)
	 					console.log("envoyer message REUSSI supprimerClient()!"); 
	 			}
	 		});

}
function getInfoFactureCB()
{
	var tab = new Array();
	console.log("TEST dans infoFactureTableau");

		for(var i = 0; i < 12 ; i ++)
		{
			if(i == 0)
				tab[i] = "idCLient" ;
			else if(i == 1)
				tab[i]= "nomcompagnie";
			else if(i == 2)
				tab[i]="adresseCompagnie";
			else if(i == 3)
				tab[i] = "adress";
			else if(i == 4)
				tab[i] = "description";
			else if(i == 5)
				tab[i] = "dateCreation";
			else if(i == 6)
				tab[i] = "TPS";
			else if(i == 7)
				tab[i] = "TVQ";
			else if(i == 8)
				tab[i] ="sousTotal";
			else if(i == 9)
				tab[i] ="total";
			else if(i == 10)
				tab[i] = "montant_payer";
			else
				tab[i] ="compte_recevoir";
		}
	console.log("TEST retourne tableau Facture");
	return tab;
	
}
function setPage( pge)
{
	page = pge;
}