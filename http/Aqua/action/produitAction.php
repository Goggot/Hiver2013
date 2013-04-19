<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/ProduitDAO.php");
 	
	class ProduitAction extends CommonAction {
		private $liste;
	
		public function __construct(){
			parent::__construct(CommonAction::$VISIBILITY_ADMIN);
		}
		
		protected function executeAction(){
			if(!empty($_POST["champNomProduit"]) && !empty($_POST["champDesc"]) && !empty($_POST["champPrix"])){
				ProduitDAO::ajoutItem();
			}
			
			if (isset($_GET["supprimer_id"])){
				ProduitDAO::deleteItem();
			}
			
			$this->liste = ProduitDAO::getItemList();
		}
		
		public function getListe(){
			return $this->liste;
		}
	}