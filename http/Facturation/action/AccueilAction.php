<?php 


/* ---------------------------------------------------
 *					                  
 *    Projet synthèse : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */


	require_once("action/CommonAction.php");
	
	class AccueilAction extends CommonAction{
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}
	
		protected function executeAction(){
		
		}
	}