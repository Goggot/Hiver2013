<?php
    #date_default_timezone_set('America/New_York');
    require_once('action/lib/nusoap.php');
    require_once('action/CommonAction.php');

    class TchatAction extends CommonAction{
        public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
        }
        
        public function executeAction() {
        }
    }
