<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Boucles</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<h1>Champs radio</h1>
		<?php
			for ($i = 1; $i <= 10; $i++){
				echo $i;
				?>
				<div></div>
				<?php
			}
			$j = 10;
			while($j >= 0){
				echo $j;
				$j--;
			}
		?>
	</body>
</html>