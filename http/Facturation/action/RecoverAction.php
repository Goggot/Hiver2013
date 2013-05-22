<?php


/* ---------------------------------------------------
 *
 *    Projet synthèse : H2013
 *    Fait Par : Erwan Palanque & Augustin Paiement
 *
 *--------------------------------------------------- */


	require_once("action/CommonAction.php");
	require_once("action/DAO/ClientDAO.php");

	class RecoverAction extends CommonAction {
		public function __construct(){
			$this->getSession();
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}
		
		protected function executeAction(){
			if (isset($_SESSION["usernameRecover"]) && isset($_POST["newPasswd"]) && isset($_POST["newPasswd2"])){
				if ($_POST["newPasswd"] === $_POST["newPasswd2"]){
					$passwd = sha1($_POST["newPasswd"] . GUERANDE);
					ClientDAO::recoverPasswd($passwd, $_SESSION["usernameRecover"]);
					header('location:index.php?logout=true');
					echo "Changement réussi !";
					exit;
				}
				else{
					echo "Les mots de passes ne concordent pas...";
				}
			}
		}

		private function getSession(){
			if (isset($_GET["forgot_key"])){
				$user = ClientDAO::findVisibility($_GET["forgot_key"]);
				if ($user[0] != FALSE){
					$_SESSION["loggedIn"] = $user[0];
					$_SESSION["usernameRecover"] = $user[1];
				}
			}
		}
	}