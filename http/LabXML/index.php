<?php
	require_once("action/IndexAction.php");

	$action = new IndexAction();
	$action->execute();

	require_once("partial/header.php");
	require_once("partial/body.php");
	include("partial/footer.php");