<?php
    require_once("action/ProduitAction.php");
    $action = new ProduitAction();
	$action->execute();
    
    require_once("element/header.php");
    require_once("element/bodyProduit.php");
    require_once("element/footer.php");