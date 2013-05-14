<?php


/* ---------------------------------------------------
 *					                  
 *    Projet synthèse : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */


    require_once("action/ClientAction.php");
    $action = new ClientAction();
    $action->execute();
    
    require_once("element/header.php");
    require_once("element/bodyCLient.php");
    require_once("element/footer.php");