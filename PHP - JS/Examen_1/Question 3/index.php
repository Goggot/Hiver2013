<?php
	session_start();
	require_once("action/indexAction.php");
	$tabNom = execute();
	require_once("element/header.php");
	require_once("element/body.php");
	require_once("element/footer.php");