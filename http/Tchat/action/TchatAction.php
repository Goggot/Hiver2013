<?php
    date_default_timezone_set('America/New_York');
    require_once('action/lib/nusoap.php');
    require_once('action/CommonAction.php');
	require_once('action/DAO/Delete.php');
	require_once('action/DAO/Transaction.php');

    class TchatAction extends CommonAction{
        public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
			if (isset($_POST["msg"]))
				TchatAction::getMessages();
			if (isset($_POST["membre"]))
				TchatAction::getListeMembre();
        }
        
        public function executeAction() {
			if (isset($_GET["delete"])) {
				Delete::getDelete($_SESSION["key"]);
			}
        }
		
		public function getListeMembre(){
			echo Transaction::getListeConnecte($_SESSION["key"]);
		}
		
		public function getMessages(){
			echo Transaction::getMessages($_SESSION["key"]);
		}
    }