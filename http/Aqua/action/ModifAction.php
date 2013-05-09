<?php
    require_once("action/CommonAction.php");
    
		class ModifAction extends CommonAction 
		{
			public function __construct()
			{
				parent::__construct(CommonAction::$VISIBILITY_ADMIN);
			}
		
		protected function executeAction() {
			
		}
		
		protected function exportText(){
			
		}
    }