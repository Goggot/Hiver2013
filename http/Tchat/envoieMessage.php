<?php
	require_once('action/CommonAction.php');
	require_once('action/DAO/Transaction.php');
	
	Transaction::envoieMessage($_SESSION["key"], $_POST["message"]);