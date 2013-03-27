<?php
	session_start();

	function execute() {
		if (!isset($_SESSION["loggedIn"])) {
			header("location:index.php");
			exit;
		}
	
		$spyList = array(); // JS new Array();
		
		$spyList[] = "Ethan Hawk";
		$spyList[] = "James Bond";
		$spyList[] = "Derek";
		
		return $spyList;
	}