<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/RSSDAO.php");

	class IndexAction extends CommonAction {
		private $liste;
		
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}
		
		public function executeAction() {
			if (isset($_GET["url"])) {
				$this->liste = RSSDAO::getElem($_GET["url"]);
			}
		}
		
		public function getListe() {
			return $this->liste;
		}
	}