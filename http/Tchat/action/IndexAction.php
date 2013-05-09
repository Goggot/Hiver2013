<?php
    require_once('action/CommonAction.php');
    require_once('action/DAO/Connection.php');

    class IndexAction extends CommonAction{
	private $error;
		
        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
        }
        
        public function executeAction() {
            if (isset($_POST["login"]) && isset($_POST["passwd"])){
                    Connection::getConnection($_POST["login"],$_POST["passwd"]);
            }
        }
    }