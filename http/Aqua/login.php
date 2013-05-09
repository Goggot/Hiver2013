<?php
	require_once("action/LoginAction.php");
	$action = new LoginAction();
	$action->execute();
	
	require_once("element/header.php");
	require_once("element/bodyLogin.php");
	require_once("element/footer.php");