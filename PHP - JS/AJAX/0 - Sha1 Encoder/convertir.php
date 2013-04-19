<?php
	// action....
	
	
	$data = $_GET["donnees"];
	
	$data = json_decode($data);
	
	$word = sha1($data[0] . $data[1]);
	
	$tab = array();
	$tab[0] = $data[0];
	$tab[1] = $data[1];
	$tab[2] = $word;
	
	echo json_encode($tab);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	