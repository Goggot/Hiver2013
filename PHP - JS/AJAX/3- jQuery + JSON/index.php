<?php
	require_once("action/IndexAction.php");

	$action = new IndexAction();
	$action->execute();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
	<head>
		<title>Mon engin de courriels</title>
		
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript">
			function verifierCourriels() {
				$.ajax({
				  url: 'lire-nb-courriels.php',
				  success: function(data) {
  					document.getElementById('contenantCourriels').innerHTML = JSON.parse(data);
					setTimeout(verifierCourriels, 2000);
				  }
				});
				
			}
		
		</script>
	</head>
	<body>
		<h1>Mes courriels</h1>
		
		Vous avez actuellement <span id="contenantCourriels">0</span> courriels.
	
		<script type="text/javascript">
			setTimeout(verifierCourriels, 2000);
		</script>
	</body>
</html>
