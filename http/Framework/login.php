<?php
	require_once("action/LoginAction.php");

	$action = new LoginAction();
	$action->execute();
	
	require_once("partial/header.php");
?>

	<form action="login.php" method="post">
		<?php
			if ($action->getResultMessage() == 2) {
				?>
				<h3 style="color:red">Nom usager / mot de passe invalide</h3>
				<?php
			}
		?>
		<div>
			<label for="username">
				Nom d'usager : 
			</label>
			<input type="text" name="username" id="username" />
		</div>

		<div>
			<label for="password">
				Mot de passe : 
			</label>
			<input type="password" name="pwd" id="password" />
		</div>
		
		<input type="submit" value="Connexion" />
	</form>
<?php
	require_once("partial/footer.php");
?>