<?php


/* ---------------------------------------------------
 *					                  
 *    Projet synthèse : H2013		        
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
			if (!empty($_POST["username"]) && !empty($_POST["pwd"]) && !empty($_POST["nom"]) 
				&& !empty($_POST["prenom"]) && !empty($_POST["adresse"]) && !empty($_POST["compagnie"])){
				$password = sha1($_POST["pwd"] . GUERANDE);
				ClientDAO::ajoutClient($password, 
										$_POST["username"], 
										$_POST["nom"], 
										$_POST["prenom"], 
										$_POST["adresse"], 
										$_POST["compagnie"]);
				header("location:client.php");
				exit;
			}
		}
    }