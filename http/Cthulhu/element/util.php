<?php 	
	$login = (isset($_POST['login'])) ? $_POST['login'] : '';
	$pass  = (isset($_POST['pass']))  ? $_POST['pass']  : '';
	
	$login = stripslashes($login);
	$pass = stripslashes($pass);
	$login = mysql_real_escape_string($login);
	$pass = mysql_real_escape_string($pass);
				
	// On récupère tout le contenu de la table
	$sql="SELECT * FROM `Connect` WHERE pseudo='$login' and passwd='$pass'";
	$result=mysql_query($sql);
	
	if(mysql_num_rows($result) < 1){
		// Register $myusername, $mypassword and redirect
		session_register("login");
		session_register("pass");
		header("location:../accueil.php");
		}
	else {
		echo "Wrong Username or Password";
	}
?>
