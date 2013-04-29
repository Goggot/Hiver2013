<?php

require_once("action/ServicesAction.php");

$server = new soap_server();
$server->register('getUsers');

function getUsers($ageMin, $ageMax) {
	$action = new ServicesAction();
	return $action->getUsers($ageMin, $ageMax);
}

// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>