<?php


/* ---------------------------------------------------
 *					                  
 *    Projet synth�se : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */

 
    require_once("action/CommonAction.php");
	require_once("action/DAO/ClientDAO.php");
    
	class ClientAction extends CommonAction{
		public function __construct(){
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}
		
		protected function executeAction(){
			
		}
		
		public function ajoutClient(){
			if (!empty($_POST["username"]) && !empty($_POST["pwd"])){
				ClientDAO::ajoutClient();
				header("location:client.php");
				exit;
			}
		}
    }