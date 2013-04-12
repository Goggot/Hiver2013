<?php
	$data = null;
	
	if (!empty($_GET["data"])) {
		header("location:resultat.php?mot=" . $_GET["data"]);
		exit;
	}
	
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Test GET</title>
	</head>
	<body>
		<?php
			if (!empty($data)) {
				?>
				<h3><?php echo $data; ?></h3>
				<?php
			}
		?>
		<form action="form-get.php" method="get">
			<input type="text" name="data" />
			<input type="submit" value="shoot !" />
		</form>
	</body>
</html>













