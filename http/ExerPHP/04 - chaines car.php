<?php
	$mot = "Lorem ipsum sin dolori";
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Les chaînes</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<h1>Mot : <?php echo $mot ?></h1>
		<div>Longueur : <?php echo strlen($mot) ?></div>
		<div>Position orem : <?php echo strpos($mot,"orem") ?></div>
		<div>Rempacer : <?php echo str_replace("rem","gique",$mot) ?></div>
		<div>Substring : <?php echo substr($mot,1,4) ?></div>
	</body>
</html>







