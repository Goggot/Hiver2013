<?php    
	require_once("action/LireNbCourrielsAction.php");

	$action = new LireNbCourrielsAction();
	$action->execute();
	
	echo $action->nbCourriels;
