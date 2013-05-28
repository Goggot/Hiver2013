
/* ---------------------------------------------------
 *					                  
 *    Projet synthèse : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */

var option;
var page; 
var idSearch;
var informationClients= new Array();

window.onload = function(){
	$( "#datepicker" ).datepicker();
	$(".datepicker").datepicker();
}

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
	 			else {
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

function champVide(event){
 	if (event.target.id == "b_ClientOK" || event.target.id == "b_FactureOK" ){
 		rafraichir();
 		var id = $('#champR1').val();
 		var nom = $('#champR2').val();
 		var val; 
 		
 		console.log("vérification de la requête client en cours...");

 		if (id != "" || nom != ""){
 			if(id != ""){
 				if(page == "client")
 					val="idC=";
 				else
 					val="idF=";

 				idSearch = id;
 				console.log("LOG: clé de recherche "+ val);
 				console.log("test id passé: requete client");
 				console.log("valeur de l'id" + id);
		 		$.ajax({
		 			url: 'ajax.php',
		 			type: 'POST',
					data: val+id,
		 			success: function(data){
		 				console.log(data);
		 				data = JSON.parse(data);			 				
		 				if(data){
		 					t=1;
		 					for(var i  in data){
		 						l=t-1;
		 						informationClients[l] = data[i];
		 						
		 						console.log("valeur tablo dans champValide"+informationClients[l]);
		 						console.log("valeur t dans champValide"+ t);
		 						console.log("valeur l dans champValide"+ l);
		 						if(page == "client"){
		 							console.log("valeur tablo dans CLIENT champValide"+informationClients[l]);
		 							document.getElementById('chmp'+t).innerHTML += informationClients[l] ;
		 						}
		 						else {
		 							console.log("valeur tablo dans FACTURE champValide"+informationClients[l]);
		 							document.getElementById('chmpFF'+t).innerHTML += informationClients[l] ;
		 						}
		 						l++;
		 						t++;
		 					}
		 				}
		 				else
		 					document.getElementById('reply').innerHTML = "Auncun résultat trouvé" ;
		 			}
		 		});
	 		}
	 		else {
	 			console.log("test nom passé: requete client");
	 			if(page == "client")
					val="nomC=";
 				else{
 					val="nomCF=";
 					lechamp= lechamp+"F";
 				}

	 			$.ajax({
		 			url: 'ajax.php',
		 			type: 'POST',
					data: val+nom,
		 			success: function(data){
		 				console.log(data);
		 				data = JSON.parse(data);
		 				if(data){
		 					var l=1;
		 					for(  var i  in data){
		 						t=l-1;
		 						document.getElementById('chmp'+l).innerHTML = data[t] + " " ;
		 					}
		 				}
		 				else
		 					document.getElementById('reply').innerHTML =  "Auncun résultat trouvé" ;
		 			}
		 		});
	 		}
	 	}
	 	else {
	 		console.log("recherche échoué les champs sont vide: requete client");
			document.getElementById('reply').innerHTML = "** Veuillez remplir tous les champs **";
	 	}
 	}
 	else if (event.target.id == "mdpf")
 		$("#reco_email").fadeIn("fast");
}

function retry(event){
 	if(event.target.id == "b_ClientRetry"){
	 	console.log("TEST -> DANS RETRY()");
	 	document.getElementById('champIdClient').value="";
	 	document.getElementById('champNomClient').value="";
	 	document.getElementById('reply').innerHTML = "";
	 	rafraichir();
 	}
}

function rafraichir(){
 	console.log("TEST -> DANS RAFRAICHIR()");

 	if(page == "client"){
 		for (var i = 1; i <= 6; i++){
 			if(document.getElementById('chmp'+ i).innerHTML != " ")
 	 		 	document.getElementById('chmp'+ i).innerHTML = ""; 
 	 	}
 	}

 	else {
 		for (var i = 1; i <= 10; i++){
			var r=i;
			if (document.getElementById('chmpFF'+ r).innerHTML != " ")
	 		 	document.getElementById('chmpFF'+ r).innerHTML = " "; 
	 	}
 	}
}
 
function verifierChampClient(){
 	if( $('#chmpC1').val() != " " && $('#chmpC2').val()  != " " && $('#chmpC3').val()  != " " && $('#chmpC4').val()  != " " && $('#chmpC5').val()  != " " && $('#chmpC6').val()  != " ")
 		return true;
 	else 
 		return false; 
}

function verifierChampFacture(){
 	if( $('#chmpF1').val()  != " " && $('#chmpF2').val()  != " " && $('#chmpF3').val()  != " " && $('#chmpF4').val()  != " " && $('#chmpF5').val()  != " " && $('#chmpF6').val()  != " " && $('#chmpF7').val()  != " " && $('#chmpF8').val()  != " " && $('#chmpF9').val()  != " ")
 		return true;
 	else 
 		return false; 
}

function confirmC(){
 	var combobox= document.getElementById('combo');
 	var titre = document.getElementById('combo').options[combobox.selectedIndex].text;
	
	if(page == "client"){
		if(option == "ajouter")
			addClient();

		if(option == "modifier"){
			modifierClient();
			console.log("LOG: modification réussit dans confirmC()");
		}

		if(option =="supprimer")
			supprimerClient();
	}

	else if( page =="facturation"){
		if(option == "ajouter")
			addFacture();

	    if(option == "modifier"){
			modifierFacture();
			console.log("LOG: modification réussit dans confirmC()");
		}

		if(option =="supprimer")
			supprimerFacture();
	}
}

function addClient(){
 	console.log("TEST -> DANS AJOUTER()");
 	//$('#bckg_resultat_CF').fadeOut(100);

	console.log("LOG: vérification des champs vide : réussit");
	var addclient= "addclient";
	var chmp1 = $('#chmpC1').val();
	var chmp2 = $('#chmpC2').val();
	var chmp3 = $('#chmpC3').val();
	var chmp4 = $('#chmpC4').val();
	var chmp5 = $('#chmpC5').val();
	var chmp6 = $('#chmpC6').val();
	var info= 'Client='+addclient+'&repC1='+chmp1+'&repC2='+chmp2 +'&repC3='+chmp3+'&repC4='+chmp4+'&repC5='+chmp5+'&repC6='+chmp6;
		
	$.ajax({
		url: 'ajax.php',
		type: 'POST',
		data: info,
		success: function(data){
			console.log("valeur de data:" + data);
			if (data)
				console.log("ajout d'un client REUSSI!"); 
		}
	});
}

function addFacture(){
 	console.log("TEST -> DANS AJOUTER()");
 	//$('#bckg_resultat_CF').fadeOut(100);
	console.log("LOG: vérification des champs vide : réussit");
	var addFacture= "addFacture";
	var tab = new Array(); 
	var info;
	var chmp1 = $('#chmpC1').val();
	var chmp2 = $('#chmpC2').val();
	var chmp3 = $('#chmpC3').val();
	var chmp4 = $('#chmpC4').val();
	var chmp5 = $('#chmpC5').val();
	var chmp6 = $('#chmpC6').val();
	var chmp7 = $('#chmpC7').val();
	var chmp8 = $('#chmpC8').val();
	var chmp9 = $('#chmpC9').val();
	var chmp10 = 100;
	var chmp11 = 333;
	tab= verifierChampFacture();
	console.log("LOG: dans addFacture " + tab);
	info = JSON.stringify(tab);
		
	$.ajax({
		url: 'ajax.php',
		type: 'POST',
		data: 'addFacture='+addFacture + '&repF1='+chmp1+'&repF2='+chmp2 +'&repF3='+chmp3+'&repF4='+chmp4+'&repF5='+chmp5+'&repF6='+chmp6 +'&repF7='+chmp7  +'&repF8='+chmp8  +'&repF9='+chmp9 +'&repF10='+chmp10 +'&rep11='+chmp11   ,
		success: function(data){
			console.log("valeur de data:" + data);
			if (data)
				console.log("ajout d'un client REUSSI!"); 
		}
	});
}

function dialog( element, section){
 	page=section;
 	option = element; 
 	console.log("TEST dans popup valeur de option" + option );
 	console.log("LOG: valeur de page dans dialog: "+page);
   
    var combobox = document.getElementById('combo');
    var champRep = document.getElementById('champRepC');
	var titre = document.getElementById('combo').options[combobox.selectedIndex].text;
  
    console.log("resultat option" + option);
    if(page == "client")
    {
		if( option == "modifier" )
		{
			for(var i = 0; i< informationClients.length; i++)
			{
				l=i+1;
				document.getElementById("chmpC"+l).value= informationClients[i]
			}
			console.log("LOG:changement des propiétés du popup");
			$(".elemP").css({"float":"none"});
			$("#col_l").css({"display":"none"});
			$("#col_PR").css({"width":"745px","margin":"auto"});
			$("#col_r").css({"width":"745px","margin":"auto", "display":"block"});
			$("#formDebut").css({"margin-left":"200px"});
			$("#formAjout").css({"margin-right":"300px"});

	 	}
	 	else if(option == "ajouter")
		{
			console.log("LOG:changement des propiétés du popup");
			$(".elemP").css({"float":"none"});
			$("#col_l").css({"display":"none"});
			$("#col_PR").css({"width":"745px","margin":"auto"});
			$("#col_r").css({"width":"745px","margin":"auto", "display":"block"});
			$("#formDebut").css({"margin-left":"200px"});
			$("#formAjout").css({"margin-right":"300px"});
		}
	  	else  if(option == "supprimer")
	 	{
	 		 console.log("3 condition " + option);
	 		 var ch1 = document.getElementById('jcomboBox');
	 		 ch1.text= "Entrez l'ID du client désiré";
	 		 var input = document.createElement("input");
			input.type="text";
	 		input.id="inputText";
	 		input.style.width="85px";
	 		$(".elemP").css({"float":"left"});
	 		champRep.appendChild(input);
	 	}
 	}
	else if(page =="facturation"){
		if( option == "modifier" ){
			for(var i = 0; i< informationClients.length -1; i++)
			{
				l=i+1;
				document.getElementById("chmpF"+l).value= informationClients[i]
			}
			console.log("LOG:changement des propiétés du popup");
			$(".elemP").css({"float":"none"});
			$("#col_l").css({"display":"none"});
			$("#col_PR").css({"width":"745px","height":"400px","margin":"auto"});
			$("#col_r").css({"width":"745px","height":"400px","margin":"auto", "display":"block"});
			$("#formDebut").css({"margin-left":"200px"});
			$("#formAjout").css({"margin-right":"300px"});
		}
		else if(option == "ajouter"){
			console.log("LOG:changement des propiétés du popup");
			$(".elemP").css({"float":"none"});
			$("#col_l").css({"display":"none"});
			$("#col_PR").css({"width":"745px","height":"400px", "margin":"auto"});
			$("#col_r").css({"width":"745px","height":"400px", "margin":"auto", "display":"block"});
			$("#formDebut").css({"margin-left":"200px"});
			$("#formAjout").css({"margin-right":"300px"});
		}
	  	else  if(option == "supprimer"){
			console.log("3 condition " + option);
			var ch1 = document.getElementById('jcomboBox');
			ch1.text= "Entrez l'ID du client désiré";
			var input = document.createElement("input");
			input.type="text";
			input.id="inputText";
			input.style.width="85px";
			$(".elemP").css({"float":"left"});
			champRep.appendChild(input);
	 	}
	}

 	$('#boxA').fadeIn('normal');
}

function getInfoComboBox(){
	console.log("LOG: dans getInfoComboBox()");
	var tab = new Array();
	for(var i = 0; i < 6 ; i ++)
	{
	if( i== 0)
	tab[i] = "Nom";
	else if(i==1)
	tab[i]="Prénom";
	else if(i == 1)
	tab[i]= "Username";
	else if(i == 2)
		tab[i]= "Adresse";
	else if(i == 3)
		tab[i]= "Nom de Compagnie";
	else if(i == 4)
		tab[i]= "Mail";
	}
	return tab;
}

function modifierClient(){
	console.log("LOG: dans modifierClient valeur de chaine apres stringify --> " + chaine)
	var tab = new Array(); 
	tab = verifierChampClient();
	var chaine = JSON.stringify(tab);
	var i=0;

	$.ajax({
		url: 'ajax.php',
		type: 'POST',
		data: 'DIF='+ chaine +'&idClient='+idSearch,
		success: function(data){
			console.log("LOG:dans modifierCLient -reçoit élément data valeur => " + data);
			if (data)
				console.log("envoyer message modifierClient() REUSSI!"); 
		}
 	});
}

function supprimerClient(){ 
 	var id = idSearch;
	console.log("dans supprimerClient() valeur de l'id: "+id);
	$.ajax({
		url: 'ajax.php',
		type: 'POST',
		data: 'DelC='+ id ,
		success: function(data)
		{
			if (data)
				console.log("LOG: valeur de data :--> "+data);
				console.log("envoyer message REUSSI supprimerClient()!"); 
		}
	});
}

function modifierFacture(){
	console.log("LOG: dans modifierClient valeur de chaine apres stringify --> " + chaine)
	var tab = new Array(); 
	tab = verifierChampFacture();
	var chaine = JSON.stringify(tab);
	for(var i=0; i < tab.length; i++)
		console.log("LOG: valeurs de table:" +tab);
	var i=0;

	$.ajax({
		url: 'ajax.php',
		type: 'POST',
		data: 'DifFacture='+ chaine +'&idFacture='+idSearch,
		success: function(data){
			console.log("LOG:dans modifierCLient -reçoit élément data valeur => " + data);
			if (data)
				console.log("envoyer message modifierClient() REUSSI!"); 
		}
	});
}

function supprimerFacture(){ 
 	var id = idSearch;
	console.log("dans supprimerClient() valeur de l'id: "+id);
	$.ajax({
		url: 'ajax.php',
		type: 'POST',
		data: 'DelF='+ id ,
		success: function(data)
		{
			if (data)
				console.log("LOG: valeur de data :--> "+data);
				console.log("envoyer message REUSSI supprimerClient()!"); 
		}
	});
}

function getInfoFactureCB(){
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

function setPage( pge){
	page = pge;
}

function verifierChampClient(){
	var l;
	var tab = new Array(); 

	for(var i = 0 ; i< 6 ; i++) {
		l= i+1;
	    tab[i] = $('#chmpC'+l).val();
	    console.log("LOG: valeur de i:" + i);
	    console.log("ajout des éléments du tableau verifierChampClient tab[i]" +tab[i] );
	}
	console.log("valeur de tab" + tab);
	return tab;
}

function verifierChampFacture(){
	var l;
	var tab = new Array(); 

	for(var i = 0 ; i< 9 ; i++) {
		l= i+1;
	    tab[i] = $('#chmpF'+l).val();
	    console.log("LOG: valeur de i:" + i);
	    console.log("ajout des éléments du tableau verifierFacture" +tab[i] );
	}
	console.log("valeur de tab" + tab);
	return tab;
}

function afficherProfil(event){
	if (event.target.id == "elementPfile"){
		$(".changeUsername").fadeOut("normal");
		$(".configAll").fadeOut("normal");
		$(".changePass").fadeIn("normal");
	}
	else if (event.target.id == "elementPfile1"){
		$(".changePass").fadeOut("normal");
		$(".configAll").fadeOut("normal");
		$(".changeUsername").fadeIn("normal");
	}
	else if(event.target.id == "elementPfile2"){
		$(".changePass").fadeOut("normal");
		$(".changeUsername").fadeOut("normal");
		$(".configAll").fadeIn("normal");
	}
}

function changePass(){
	
}

function changeUsername(){
	
}

function configAll(){
	
}