<?php

require_once("action/IndexAction.php");

$action = new IndexAction();
$action->execute();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
	<head>
		<title>Test de Web services</title>
	</head>
	<body>
		<h1>Les Web services</h1>
		<?php
			if ($action->getResultat() == null) {
				?>
					<form action="index.php" method="post">
						Age min : <input type="text" name="ageMin" style="width:40px;" value="" /><br/>
						Age max : <input type="text" name="ageMax" style="width:40px;" value="" /><br/>
						<input type="submit" value="Recherche" />
					</form>
				<?php
			}
			else if (is_array($action->getResultat())) {
				?>
				<h2>Nombre d'usagers : <?php echo sizeof($action->getResultat()); ?></h2>
				<?php
				
				foreach ($action->getResultat() as $user) {
					?>
					- <?php echo $user; ?><br/>
					<?php
				}
			}
		?>
		
	</body>
</html>
