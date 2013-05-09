<?php
	
	// JSON
	
	$list = array();
	$list["elem1"] = "Blabla";
	$list["elem2"] = array("1", "4", "3");
	
	var_dump($list);
	$encoded = json_encode($list);
	echo $encoded;
	
	$decoded = json_decode($encoded);
	var_dump($decoded);
	