<?php

    #date_default_timezone_set('America/New_York');
    session_start();
    require_once("action/DAO/Connection.php");
    require_once("action/DAO/Deconnection.php");
    
    abstract class CommonAction {
		public static $VISIBILITY_PUBLIC = 0;
		public static $VISIBILITY_MEMBER = 1;
	
		private $pageVisibility;
	
		public function __construct($pageVisibility) {
			$this->pageVisibility = $pageVisibility;
		}

		public function execute() {
			if (isset($_GET["logout"])) {
				Deconnection::getDeconnected($_SESSION["key"]);
				session_unset();
				session_destroy();
				session_start();
			}
		
			if (!isset($_SESSION["loggedIn"])) {
				$_SESSION["loggedIn"] = CommonAction::$VISIBILITY_PUBLIC;
			}
		
			if ($_SESSION["loggedIn"] < $this->pageVisibility) {
				header("location:index.php");
				exit;
			}
			
			$this->executeAction();
		}
		
		public function isLoggedIn() {
			return $_SESSION["loggedIn"] > CommonAction::$VISIBILITY_PUBLIC;
		}
		
		public function theme(){
			if (isset($_GET["theme"]))
				$_SESSION["theme"] = $_GET["theme"];

			if (!isset($_SESSION["theme"]))
				$_SESSION["theme"] = 1;

			
			if ($_SESSION["theme"] == 1){
				echo '<script src="js/tinktank.js" id="jstheme"></script>
					  <link href="css/tinktank.css" rel="stylesheet" type="text/css" media="screen" id="theme"/>
					  <audio id="audio" src="sounds/gear.wav" preload="auto"></audio>';
			}
			else if ($_SESSION["theme"] == 2){
				echo '<script src="js/anim3D.js" id="jstheme"></script>
					  <link href="css/anim3D.css" rel="stylesheet" type="text/css" media="screen" id="theme"/>';
			}
			else if ($_SESSION["theme"] == 3){
				echo '<script src="js/anim3D.js" id="jstheme"></script>
					  <link href="css/anim3D.css" rel="stylesheet" type="text/css" media="screen" id="theme"/>';
			}
		}
		
		protected abstract function executeAction();
    }