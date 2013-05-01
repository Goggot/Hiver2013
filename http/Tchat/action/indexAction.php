<<<<<<< HEAD
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
=======
<?php
    date_default_timezone_set('America/New_York');
    require_once('action/lib/nusoap.php');
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
>>>>>>> 152350bc0aff61dbdf524b0b6b84bec8629bd558
    }