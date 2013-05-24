<?php


/* ---------------------------------------------------
 *					                  
 *    Projet synthèse : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */


    require_once("action/AccueilAction.php");
    $action = new AccueilAction();
    $action->execute();
    
    require_once("element/header.php");
    require_once("element/bodyAccueil.php");
    require_once("element/footer.php");