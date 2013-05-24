<?php


/* ---------------------------------------------------
 *					                  
 *    Projet synthèse : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */


	require_once("action/CommonAction.php");
	require_once("action/DAO/FactureDAO.php");

	class FacturationAction extends CommonAction{
		public function __construct(){
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}
		
		protected function executeAction(){
			
		}
	}