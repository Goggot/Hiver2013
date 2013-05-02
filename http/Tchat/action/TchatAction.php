<?php
    #date_default_timezone_set('America/New_York');
    require_once('action/CommonAction.php');
	require_once('action/DAO/Delete.php');

    class TchatAction extends CommonAction{
        public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
        }
        
        public function executeAction() {
			if (isset($_GET["delete"])) {
				Delete::getDelete($_SESSION["key"]);
			}
        }
    }