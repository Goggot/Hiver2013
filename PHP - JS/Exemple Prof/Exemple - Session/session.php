<?php
	session_start();
	
	session_unset();
	session_destroy();
	session_start();
	
	if (!isset($_SESSION["data"])) {
		$_SESSION["data"] = "Derek";
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Test session</title>
	</head>
	<body>
		Valeur : <?php echo $_SESSION["data"]; ?>
	</body>
</html>