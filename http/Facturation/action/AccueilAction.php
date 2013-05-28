<?php 


/* ---------------------------------------------------
 *					                  
 *    Projet synthèse : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */


	require_once("action/CommonAction.php");
	require_once("action/DAO/OperationsDAO.php");
	
	class AccueilAction extends CommonAction{

		private $nbFacture;
		private $nbCLients;
		private $nbProjets;
		private $nbComptRecevoir;

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}
	
		protected function executeAction(){
			//$this->nbFacture = OperationsDAO::getNbFacture(); 
			//$nbCLients= OperationsDAO::getNbClient();
			//$nbprojets = OperationsDAO::getNbProjets(); 
			//$nbComptRecevoir = OperationsDAO::getCompteRecevoir(); 

			
		}



		/**************************************************************
								FUNCTION get
			*************************************************************/

		public static function getFacture()
		{
			return $this->nbFacture; 
		}
		public static function getClients()
		{
			return $this->nbCLients; 
		}
		public static function getProjets()
		{
			return $this->nbProjets; 
		}

		public static function getnbComptRecevoir()
		{
			return $this->nbComptRecevoir; 
		}
	}