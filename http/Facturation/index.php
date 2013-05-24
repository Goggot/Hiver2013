<?php


/* ---------------------------------------------------
 *					                  
 *    Projet synthèse : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */


    require_once("action/IndexAction.php");
    $action = new IndexAction();
    $action->execute();
    
    require_once("element/header.php");
    require_once("element/bodyIndex.php");
    require_once("element/footer.php");