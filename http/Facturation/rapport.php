<?php


/* ---------------------------------------------------
 *					                  
 *    Projet synthèse : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */


    require_once("action/RapportAction.php");
    $action = new RapportAction();
	$action->execute();
    
    require_once("element/header.php");
    require_once("element/bodyRapport.php");
    require_once("element/footer.php");