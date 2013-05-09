<?php
	require_once("action/CommonAction.php");

	class LireNbCourrielsAction extends CommonAction {
		public $nbCourriels;
	
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
			
		}
	
		protected function executeAction() {
			$this->nbCourriels = rand(0, 10);
		}
	}


	
	
	
	
	
	