<?php
	date_default_timezone_set('America/New_York');
	require_once('action/CommonAction.php');
	require_once('action/DAO/Transaction.php');
	
	echo Transaction::getMembres($_SESSION["key"]);