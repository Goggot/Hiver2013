<?php


/* ---------------------------------------------------
 *					                  
 *    Projet synthèse : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */


	require_once("action/CommonAction.php");
 	
	class RapportAction extends CommonAction {
		private $liste;
	
		public function __construct(){
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}
		
		protected function executeAction(){
			if(!empty($_POST["champNomProduit"]) && !empty($_POST["champDesc"]) && !empty($_POST["champPrix"])){
				//ProduitDAO::ajoutItem();
			}
			
			if (isset($_GET["supprimer_id"])){
				//ProduitDAO::deleteItem();
			}
			
			//$this->liste = ProduitDAO::getItemList();
		}
		
		public function getListe(){
			return $this->liste;
		}
	}