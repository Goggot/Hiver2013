<?php


/* ---------------------------------------------------
 *					                  
 *    Projet synth�se : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */


	require_once("action/CommonAction.php");

	class ProfileAction extends CommonAction {
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}
		
		protected function executeAction() {
			// Aller chercher info usager
		}
	}