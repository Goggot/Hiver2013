<?php


/* ---------------------------------------------------
 *					                  
 *    Projet synthèse : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */


    require_once("action/ProfileAction.php");
    require_once("action/DAO/OperationsDAO.php");
    $action = new ProfileAction();
    $action->execute();
    
    require_once("element/header.php");
    require_once("element/bodyProfil.php");
    require_once("element/footer.php");