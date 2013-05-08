<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Language" content="fr" />
		<meta name="description" content="La balise Meta DESCRIPTION décrit le contenu de la page web" />		
		<meta name="keywords" content="La balise Meta KEYWORDS regroupe les principaux mots-clés de la page web par langue" />
		<meta name="author" content="auteur du site" />
		<meta name="category" content="La balise Meta CATEGORY définit la catégorie de la page web" />
		<meta name="copyright" content="La balise Meta COPYRIGHT définit le copyright de la page web" />
		<meta name="publisher" content="(La balise Meta PUBLISHER précise le nom de la personne ayant publiée la page web) Erwan Palanque" />
		<meta name="revisit-after" content="7 days" />
		<meta name="robots" content="all" />
		<meta name="googlebot" content="archive" />
		<meta name="title" content="titre du site" />
		<!-- feuille de style pour IE -->
		<!-- CSS valide IE -->
		<!-- favicon valide pour IE -->
			<!--[if IE]>
				<link rel="stylesheet" media="screen" type="text/css" href="design/styleIE.css" />
				<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
			<![endif]-->
			
		<!-- feuille de style pour tous les navigateurs sauf IE -->
		<!-- favicon tipe : .gif; .jpg; .png; .ico; -->
			<!--[if !IE]><-->
				<link rel="stylesheet" media="screen" type="text/css" href="Cthulhu/design/style.css"  />
				<link rel="icon" type="Cthulhu/image/png" href="Cthulhu/images/favicon.png" />
			<!--><![endif]-->
		<title>Pouet</title>
	</head>

	<body>
		<?php 	include("Cthulhu/element/connect_sql.php");
			include("Cthulhu/element/entete.php"); ?>
		
		<div id="connexion">
			<form action="Cthulhu/element/util.php" method="post">
				<p>
				   <label for="login">Pseudo : </label><input type="text" name="login" />
				   <label for="pass">Mot de passe : </label><input type="password" name="pass" />
				   <input type="submit" value="Valider" />
				   <a href="Cthulhu/accueil.php">Page d'accueil</a>
				</p>
			</form>
		</div>
		
	</body>
</html>
