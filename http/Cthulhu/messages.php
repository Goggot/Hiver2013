<?php
	session_start();
	if ((!isset($_SESSION['login'])) || (empty($_SESSION['login'])))
	{
		// la variable 'login' de session est non déclaré ou vide
		echo '<a href="index.php" title"Connexion">Connexion</a>';
		exit();
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Language" content="fr" />
		<meta name="author" content="auteur du site" />
		<meta name="publisher" content="(La balise Meta PUBLISHER précise le nom de la personne ayant publiée la page web) Erwan Palanque" />
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
				<link rel="stylesheet" media="screen" type="text/css" href="design/style.css"  />
				<link rel="icon" type="image/png" href="images/favicon.png" />
			<!--><![endif]-->
		<title>Pouet</title>
	</head>

	<body>
		<?php include("element/connect_sql.php");
			  include("element/entete.php");
			  include("element/menuH.php");
			  include("element/menuV.php");?>
			  
		<div id="txt">
			<form action="element/ecriture_donnees.php" method="post"><br />
		        <p>
		        <label for="titre">Titre</label></br><input id="titre" type="text" name="titre" id="titre" /><br />
		        <input id="msg" type="text" name="contenu" id="contenu" /><br />
		
		        <input type="submit" value="Envoyer" />
				</p>
		    </form> 
    	</div>
    	
		<?php include("element/pied.php"); ?>
	</body>
</html>