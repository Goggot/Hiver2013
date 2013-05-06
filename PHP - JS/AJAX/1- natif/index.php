<?php
	require_once("action/IndexAction.php");

	$action = new IndexAction();
	$action->execute();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
	<head>
		<title>Mon engin de courriels</title>
		
		<script type="text/javascript">
			function verifierCourriels() {
				// ÉTAPE 1 : Création de l'objet
				var xmlhttp = new XMLHttpRequest();
  				
				// ÉTAPE 2 : Définir quoi faire après avoir reçu la réponse/html du serveur 
				xmlhttp.onreadystatechange = function() {
					if(xmlhttp.readyState == 4) {
  						document.getElementById('contenantCourriels').innerHTML = xmlhttp.responseText;
						setTimeout(verifierCourriels, 2000);
  					}
				}
				
				// ÉTAPE 3 : Envoyer la requête
				xmlhttp.open("GET","lire-nb-courriels.php?rnd=" + Math.random(),true);
				xmlhttp.send(null); // Si on était en post, on aurait changer "null" pour "param=valeur&param2=valeur2"
			}
		
		</script>
	</head>
	<body>
		<h1>Mes courriels</h1>
		
		Vous avez actuellement <span id="contenantCourriels">0</span> courriels.
	
		<script type="text/javascript">
			setTimeout(verifierCourriels, 2000);
		</script>
	</body>
</html>
