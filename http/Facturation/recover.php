<?php


/* ---------------------------------------------------
 *					                  
 *    Projet synthèse : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */


    require_once("action/RecoverAction.php");
    $action = new RecoverAction();
    $action->execute();
    
    require_once("element/header.php");
    require_once("element/bodyRecover.php");
    require_once("element/footer.php");