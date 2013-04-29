<?php

require_once("action/IndexAction.php");

$action = new IndexAction();
$action->execute();

?>
<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<?php
			if (empty($action->error)) {
				?>
				<div>Clef : <?php echo $action->key; ?></div>
				<div>Voir statut des usagers : <a href="http://b63server.notes-de-cours.com/watch-eye.php">Watch Eye</a></div>
				<?php
			}
			else {
				?>
				Erreur : <?php echo $action->error; ?>
				<?php
			}
		?>
		
	</body>
</html>
