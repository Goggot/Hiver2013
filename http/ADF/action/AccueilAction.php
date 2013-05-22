<?php 
	require_once("action/CommonAction.php");
	require_once("action/DAO/OperationsDAO.php");
	
	class AccueilAction extends CommonAction{
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}
	
		protected function executeAction(){
		}
	}