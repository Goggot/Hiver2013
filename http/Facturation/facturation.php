<?php


/* ---------------------------------------------------
 *					                  
 *    Projet synthèse : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */


    require_once("action/FacturationAction.php");
    $action = new FacturationAction();
    $action->execute();
    
    require_once("element/header.php");
    require_once("element/bodyFacturation.php");
    require_once("element/footer.php");