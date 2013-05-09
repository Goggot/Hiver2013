<!DOCTYPE html>
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
		<title>Cthulhu</title>
	</head>

	<body>
		<?php 	require_once("element/connect_sql.php");
			require_once("element/entete.php"); 
			require_once("element/menuH.php"); 
			require_once("element/menuV.php"); 
			$nom; ?>
			
			<div id="txt">
				<h1 id ="titre">Bienvenue !</h1>
					<p id=contenu>
					<?php
						if (htmlspecialchars(isset($_GET['nom'])))
						{	
							$req = $bdd->prepare('SELECT text FROM pouet WHERE nom = ?');
							$req -> execute(array($_GET['nom']));
							$donnees = $req->fetch();
							echo $donnees['text'];
						}
						else
						{ ?> 
						Veuillez selectionner un nom à droite 
-------------------------------------------------------------------------------------------------->>
						<?php } ?>
					<p>
			</div>
		<?php require_once("element/pied.php"); ?>
	</body>
</html>