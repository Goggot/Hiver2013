<?php
    #date_default_timezone_set('America/New_York');
    require_once('action/lib/nusoap.php');
    require_once('action/CommonAction.php');

    class IndexAction extends CommonAction{
        public $key;
        public $error;

        public function __construct() {
            parent::_construct(CommonAction::$VISIBILITY_PUBLIC);
        }
        
        public function execute() {
            
            if(null){
                echo("Utilisateur ou mot de passe incorrect...");
            }
            else {
                header("Location:tchat.php");
            }
        }
    }