<!DOCTYPE html>
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	    <head>
	        <title>Tchat</title>
	        <link href="css/anim3D.css" rel="stylesheet" type="text/css" media="screen" />
			<script src="js/anim3D.js"></script>
			<script src="js/commonScript.js"></script>
			<script src="js/jquery.js"></script>
			<script src="js/jquery.transit.min.js"></script>
			<script src="js/three.js"></script>
	    </head>
	    <body>
			<script>
				setTimeout(verifierMembres, 1000);
				setTimeout(verifierMessages, 1000);
			</script>
			<div id="main">
				<div id="liste">
					<p id="membres"></p></br>
					<a href="?logout=1">Logout</a></br>
					<a href="?delete=1" style="color:red;">Delete Account</a>
				</div>
				
				<div id="tchat">
					<div id="text">
						<p id="messages"></p>
					</div>
						<p>
						   <input id="conv" type="text" name="conv" onkeypress="texte(event);" />
						   <button onclick="envoieMessage(null);"/>Envoyer</button>
						</p>
				</div>
			</div>
	    </body>
	</html>