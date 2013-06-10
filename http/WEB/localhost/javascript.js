var infos = false;
var load = false;

window.onload = function(){
	$("#left").fadeIn("normal");
}

function presentation(){
	$('#infos').fadeTo('normal', 0.9);
	document.getElementById('infos').innerHTML =
		"<h1>Presentation</h1>" +
		"<p>Jail Run est un jeu de plateforme avec vue en hauteur. Le personnage principal se nomme Fred. Fred est emprisonn� dans un b�timent "+
		"spatial de haute s�curit� dont aucun prisonnier ne s'est jamais �chapp�. Les seuls �tres biologiques des b�timents sont les "+
		"prisonniers. La prison est gard�e par des robots, des drones, qui d�clencheront des pi�ges ou attaqueront s'ils d�couvrent "+
		"un prisonnier hors de sa cellule. Elle est aussi gard�e par des cam�ras de s�curit�, des lasers, et d�autres zones de "+
		"d�tection en tout genre. Un champ de force spatial fait en sorte d'attirer tout vaisseau se trouvant � proximit� de "+
		"la station s'il est activ�. Fred va tenter de s'enfuir, mais avec un avantage sur tous ses pr�d�cesseurs : il peut "+
		"contr�ler le temps sur une courte p�riode. Il va donc essayer de d�jouer les pi�ges et le syst�me informatique install�s "+
		"dans la prison pour atteindre le spatioport et voler un vaisseau spatial afin de s��vader !</p>";
	if (!load){
		load = true;
		$("#infos").fadeIn("normal");
	}
}

function infosJeu() {
	$('#infos').fadeTo('normal', 0.9);
	document.getElementById('infos').innerHTML =
		"<h1>Infos utiles pour le jeu</h1>" +
		"<p>Les commandes :"+
		"<p style='color:red'>Haut : W</br>Bas : S</br>Gauche : A</br>Droite : D</br>"+
		"Zapper : SPACE</br>Reculer dans le temps : SHIFT</p>"+
		"Le jeu commence dans la cellule de Fred, la porte est ouverte et Fred s'est procur� un zapper contre les robots, "+
		"mais seulement pour les immobilis�s pendant 3 secondes. Fred ne peut pas les d�truire. Fred doit �viter les gardes et de trouver les salles de contr�les "+
		" afin de d�sactiver les portes blind�es et les pi�ges qui jonchent le sol proche de la sortie. Le jeu �tant incomplet, il n'y a "+
		"pas de pi�ges, seulement des gardes.</br>"+
		"Le but : sortir en vie de la prison !</p>";
	if (!load){
		load = true;
		$("#infos").fadeIn("normal");
	}
}

function description() {
	$('#infos').fadeTo('normal', 0.9);
	document.getElementById('infos').innerHTML =
		"<h1>A propos</h1>" +
		"<p>Temps investit (approximation) : 95 heures</br>"+
		"Mes coordonnees : erwan.benard@gmail.com</p>";
	if (!load){
		load = true;
		$("#infos").fadeIn("normal");
	}
}

function outils() {
	$('#infos').fadeTo('normal', 0.9);
	document.getElementById('infos').innerHTML =
		"<h1>Outils et languages utilises</h1>" +
		"<p>Languages : python 3.2 32bit</br>"+
		"Librairie graphique : pygame 1.9.2 32bit</br>"+
		"IDE : Pycharm, Sublime Text</p>";
	if (!load){
		load = true;
		$("#infos").fadeIn("normal");
	}
}

function screenshot() {
	$('#infos').fadeTo('normal', 1.0);
	document.getElementById('infos').innerHTML =
		"<h1>Screenshots</h1>" +
		"<img width='800px' src='localhost/sc1.png'></br>"+
		"<img width='800px' src='localhost/sc2.png'></br>"+
		"<img width='800px' src='localhost/sc3.png'>";
	if (!load){
		load = true;
		$("#infos").fadeIn("normal");
	}
}