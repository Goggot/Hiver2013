<?php
	require_once('action/CommonAction.php');
	require_once('action/DAO/Transaction.php');
	
	echo Transaction::getMembres($_SESSION["key"]);