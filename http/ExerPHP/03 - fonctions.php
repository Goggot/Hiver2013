<?php
	function encoder($string,$mot = null){
		if (isset($mot)){	#isset -> is set -> different de null
			$string .= $mot;
		}
		return sha1($string,"lkafnhoiehfeiwfjoiewgftwejqfqoihgrehyewjrpofqjfpemqhf");	#Encodage
	}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Les fonctions</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<h1>Valeur encodée</h1>
		<p><?php echo encoder("Derek"); ?></p>
		<p><?php echo encoder("Derek","Erwan"); ?></p>
	</body>
</html>







