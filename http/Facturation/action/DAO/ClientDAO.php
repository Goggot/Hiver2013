<?php


/* ---------------------------------------------------
 *					                  
 *    Projet synthèse : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */


	class ClientDAO {
		public static function authenticate($username, $password){
			$connection = Connection::getConnection();
			
			// ENCRYPTER LE MOT DE PASSE AVANT L'ENVOIE EN PARAMÈTRE
			
			$query = "SELECT * FROM EA_ADMIN WHERE USERNAME = :pUsername AND MDP = :pPassword";
			$statement = oci_parse($connection, $query);
			
			oci_bind_by_name($statement, ":pUsername", $username);
			oci_bind_by_name($statement, ":pPassword", $password);
			oci_execute($statement);
			
			$userInfo = null;
			echo oci_fetch_array($statement);
			if ($row = oci_fetch_array($statement)) {
				echo "Reussi";
				$userInfo = array();
				$userInfo["username"] = $row["USERNAME"];
				$userInfo["real_name"] =  $row["PRENOM"] . " " . $row["NOM"];
				$userInfo["visibility"] = $row["VISIBILITY"];
			}
			
			return $userInfo;
		}
		
		public static function ajoutClient($password, $pseudo, $nom, $prenom, $adresse, $compagnie){
			$connection = Connection::getConnection();
			
			// ENCRYPTER LE MOT DE PASSE AVANT L'ENVOIE EN PARAMÈTRE
			
			$query = "INSERT INTO EA_CLIENTS 
						VALUES(EA_CLIENTS_SEQ.nextVal, :pseudo, :nom, :prenom, :adresse, :compagnie, :mdp, :visibility)";
			$statement = oci_parse($connection, $query);
			
			oci_bind_by_name($statement, ":pseudo", $pseudo);
			oci_bind_by_name($statement, ":nom", $nom);
			oci_bind_by_name($statement, ":prenom", $prenom);
			oci_bind_by_name($statement, ":adresse", $dresse);
			oci_bind_by_name($statement, ":compagnie", $compagnie);
			oci_bind_by_name($statement, ":mdp", $password);
			oci_bind_by_name($statement, ":visibility", 1);
			oci_execute($statement);
		}

		public static function getClientList(){
			$connection = Connection::getConnection();
			
			$query = "SELECT * FROM EA_CLIENTS";
			$statement = oci_parse($connection, $query);
			oci_execute($statement);
			
			$userList = array();
			while ($row = oci_fetch_array($statement)) {
				$userList[] = $row;
			}
			
			return $userList;
		}

		public static function findVisibility($key){
			$valid = [FALSE, 0];
			$connection = Connection::getConnection();
			$query = "SELECT * FROM EA_CLIENTS WHERE recovery_key = :reco";
			$statement = oci_parse($connection, $query);
			oci_bind_by_name($statement, ":reco", $key);
			oci_execute($statement);

			if ($row = oci_fetch_array($statement)) {
				$valid[0] = $row["VISIBILITY"];
				$valid[1] = $row["USERNAME"];
			}
			return $valid;
		}

		public static function recoverPasswd($passwd, $username){
			$connection = Connection::getConnection();
			$query = "UPDATE EA_CLIENTS SET MDP = :passwd, RECOVER_KEY =  WHERE username = :username";
			$statement = oci_parse($connection, $query);
			oci_bind_by_name($statement, ":passwd", $passwd);
			oci_bind_by_name($statement, ":username", $username);
			oci_bind_by_name($statement, ":reco", "");
			oci_execute($statement);
		}

		public static function forgotPasswd($email){
			$message = "Un message de réinitialisation de mot de passe à été envoyé à votre adresse email";
			$connection = Connection::getConnection();
			$query = "SELECT * FROM EA_CLIENTS WHERE email = :email";
			$statement = oci_parse($connection, $query);
			oci_bind_by_name($statement, ":email", $email);
			oci_execute($statement);

			if ($row = oci_fetch_array($statement)) {
				$key = encrypt();

				$queryTemp = "UPDATE EA_CLIENTS SET recover_key = :key WHERE email = :email";
				$statementTemp = oci_parse($connection, $queryTemp);
				oci_bind_by_name($statementTemp, ":email", $email);
				oci_bind_by_name($statementTemp, ":key", $key);
				oci_execute($statementTemp);

				$url = "localhost/recover.php?forgot_key=" . $key;
				$msg = "Bonjour,<br>
				Une demande a été envoyée récemment pour modifier le mot de passe de votre compte.<br>
				Si vous avez demandé cette modification de mot de passe,</br>
				définissez un nouveau mot de passe en suivant le lien ci-dessous : <br>" . $url
				. "<br>Si vous ne souhaitez pas modifier votre mot de passe, ignorez simplement ce message. ";
				$valid = mail($row["EMAIL"], 'Confirmation de la réinitialisation du mot de passe', $msg);
				if (!$valid)
					$message = "Erreur système :(";
			}
			else {
				$message = "Adresse email inexistante :(";
			}
			return $message;
		}

		private static function encrypt(){
			$key = NULL;
			for ($i = 0; $i < 20; $i++){
				$l = "qwertyuiopmnbvcxzasdflkjhg0123456789";
				$r1 = rand(0,36);
				$r2 = rand(0,36);
				$key .= substr($l,$r2,1) . substr($l,$r1,1);
			}
			return $key;
		}
	}