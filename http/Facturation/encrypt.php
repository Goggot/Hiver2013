<?php 
	$key = null;
	for ($i = 0; $i < 20; $i++){
		$l = "qwertyuiopmnbvcxzasdflkjhg0123456789";
		$r1 = rand(0,36);
		$r2 = rand(0,36);
		$key .= substr($l,$r2,1) . substr($l,$r1,1);
	}
	echo $key;