<?php
	require_once("action/formulaireAction.php");
	$showBox = execute();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Les formulaires</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<?php
			if ($showBox){
			?>
				<h2 style="color:green;">Good</h2>
			<?php
			}
		?>
		<form action="07 - formulaire.php" method="get">
			<div>
				Info : <input type="text" name="info" />
			</div>
			<div>
				<input type="submit" value="Go!" />
			</div>
		</form>
	</body>
</html>