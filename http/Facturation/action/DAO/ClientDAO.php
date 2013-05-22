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
			echo $username . "</br>" . $password . "</br>";
			$query = "SELECT * FROM EA_ADMIN WHERE USERNAME = :pUsername AND MDP = :pPassword";
			$statement = oci_parse($connection, $query);
			
			oci_bind_by_name($statement, ":pUsername", $username);
			oci_bind_by_name($statement, ":pPassword", $password);
			oci_execute($statement);
			
			$userInfo = null;
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
			$query = "INSERT INTO EA_CLIENTS 
						VALUES(EA_CLIENTS_SEQ.nextVal, :pseudo, :nom, :prenom, :adresse, :compagnie, :mdp, :visibility)";
			$statement = oci_parse($connection, $query);
			$visib = 1;
			oci_bind_by_name($statement, ":pseudo", $pseudo);
			oci_bind_by_name($statement, ":nom", $nom);
			oci_bind_by_name($statement, ":prenom", $prenom);
			oci_bind_by_name($statement, ":adresse", $dresse);
			oci_bind_by_name($statement, ":compagnie", $compagnie);
			oci_bind_by_name($statement, ":mdp", $password);
			oci_bind_by_name($statement, ":visibility", $visib);
			oci_execute($statement);
		}
		public static function ajouterUnClient($id, $nom, $prenom, $username, $adresse, $compagnie){
			$connection = Connection::getConnection();
			$query = "INSERT INTO EA_CLIENTS 
						VALUES(EA_CLIENTS_SEQ.nextVal, :pseudo, :nom, :prenom, :adresse, :compagnie, :mdp, :visibility)";
			$statement = oci_parse($connection, $query);
			$visib = 1;
			oci_bind_by_name($statement, ":pseudo", $id);
			oci_bind_by_name($statement, ":nom", $nom);
			oci_bind_by_name($statement, ":prenom", $prenom);
			oci_bind_by_name($statement, ":adresse", $username);
			oci_bind_by_name($statement, ":compagnie", $adresse);
			oci_bind_by_name($statement, ":mdp", $compagnie);
			oci_execute($statement);
			return $statement;
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
			echo $key;
			$valid = array();
			$connection = Connection::getConnection();
			$query = "SELECT * FROM EA_USERS WHERE RECOVER_KEY = :reco";
			$statement = oci_parse($connection, $query);
			oci_bind_by_name($statement, ":reco", $key);
			oci_execute($statement);

			if ($row = oci_fetch_array($statement)) {
				$valid[] = $row["VISIBILITY"];
				$valid[] = $row["USERNAME"];
			}
			return $valid;
		}

		public static function recoverPasswd($password, $username){
			$null = null;
			$connection = Connection::getConnection();
			$query = "UPDATE EA_USERS SET MDP = :passwd, RECOVER_KEY = :reco WHERE username = :username";
			$statement = oci_parse($connection, $query);
			oci_bind_by_name($statement, ":passwd", $password);
			oci_bind_by_name($statement, ":username", $username);
			oci_bind_by_name($statement, ":reco", $null);
			oci_execute($statement);
		}

		public static function forgotPasswd($email){
			echo $email . "</br>";
			$message = "Un message de réinitialisation de mot de passe a été envoyé à votre adresse email";
			$connection = Connection::getConnection();

			$query = "SELECT * FROM EA_USERS WHERE MAIL = :email";
			$statement = oci_parse($connection, $query);
			oci_bind_by_name($statement, ":email", $email);
			oci_execute($statement);

			$row = oci_fetch_array($statement);

			if ($row) {
				$key = ClientDAO::encrypt();
				$queryTemp = "UPDATE EA_USERS SET RECOVER_KEY = :key WHERE MAIL = :email";
				$statementTemp = oci_parse($connection, $queryTemp);
				oci_bind_by_name($statementTemp, ":email", $email);
				oci_bind_by_name($statementTemp, ":key", $key);
				oci_execute($statementTemp);

				$url = "localhost/recover.php?forgot_key=" . $key;
				$msg = "Bonjour,
				Une demande a été envoyée récemment pour modifier le mot de passe de votre compte.<br>
				Si vous avez demandé cette modification de mot de passe,
				définissez un nouveau mot de passe en suivant le lien ci-dessous : " . $url
				. "Si vous ne souhaitez pas modifier votre mot de passe, ignorez simplement ce message. ";
				$valid = mail($row["MAIL"], 'Confirmation de la réinitialisation du mot de passe', $msg);
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

		public static function rechercheClientID( $id)
	{
		$connection = Connection::getConnection();
		$query = "SELECT * FROM EA_CLIENTS WHERE ID = :id";
		$statement = oci_parse($connection, $query);
		oci_bind_by_name($statement, ":id", $id);
		oci_execute($statement);
		$infoClients = null;
			if ($row = oci_fetch_array($statement)) 
			{
				//echo "Reussi: recherche client par id";
				$infoClients = array();
				$infoClients["ID"] = $row["ID"];
				$infoClients["NOM"] = $row["NOM"] . " " . $row["PRENOM"];
				$infoClients["USERNAME"] = $row["USERNAME"];
				$infoClients["ADRESSE"] = $row["ADRESSE"];
				$infoClients["NOMCOMPAGNIE"] = $row["NOMCOMPAGNIE"];
				$infoClients["MAIL"] = $row["MAIL"];
			}

		return json_encode($infoClients);
	}
	/*public static function rechercheClientNom( $nom)
	{
		
		$connection = Connection::getConnection();
		$query = "SELECT * FROM EA_CLIENTS WHERE NOM = :nom";
		$statement = oci_parse($connection, $query);
		oci_bind_by_name($statement, ":nom", $nom);
		oci_execute($statement);
		$infoClients = null;
			if ($row = oci_fetch_array($statement)) 
			{
				//echo "Reussi: recherche client par nom";
				$infoClients = array();
				$infoClients["ID"] = $row["ID"];
				$infoClients["NOM"] = $row["NOM"] . " " . $row["PRENOM"];
				$infoClients["USERNAME"] = $row["USERNAME"];
				$infoClients["ADRESSE"] = $row["ADRESSE"];
				$infoClients["NOMCOMPAGNIE"] = $row["NOMCOMPAGNIE"];
				$infoClients["MAIL"] = $row["MAIL"];
			}

		return json_encode($infoClients);
	}*/
	public static function rechercheClientNom( $nom)
	{
		
		$connection = Connection::getConnection();
		$query = "SELECT * FROM EA_CLIENTS WHERE NOM = :nom";
		$statement = oci_parse($connection, $query);
		oci_bind_by_name($statement, ":nom", $nom);
		oci_execute($statement);
		$infoClients = null;
			if ($row = oci_fetch_array($statement)) 
			{
				//echo "Reussi: recherche client par nom";
				$infoClients = array();
				$infoClients["ID"] = $row["ID"];
				$infoClients["NOM"] = $row["NOM"] . " " . $row["PRENOM"];
				$infoClients["USERNAME"] = $row["USERNAME"];
				$infoClients["ADRESSE"] = $row["ADRESSE"];
				$infoClients["NOMCOMPAGNIE"] = $row["NOMCOMPAGNIE"];
				$infoClients["MAIL"] = $row["MAIL"];
			}

		return json_encode($infoClients);
	}
	public function optionClient( $nom , $reponse , $option, $idClient)
	{
		$connection = Connection::getConnection();
		$name = strtoupper($nom);
		 if( $option == "modifier")
		{
			$query = "UPDATE  EA_CLIENTS SET :name = :rep WHERE ID = :idCLient";
			oci_bind_by_name($statement, ":name", $name);
			oci_bind_by_name($statement, ":rep", $reponse);
		}
		else if ($option == "supprimer")
		{
			$query = "DELETE FROM EA_CLIENTS WHERE ID = :idCLient";
			oci_bind_by_name($statement, ":id", $idClient);
		}

		$statement = oci_parse($connection, $query);
		oci_execute($statement);
		
		return $statement ;
		
	
	}
	public static function ajouterClient( $idClient, $nom, $prenom, $username,$nomcompagnie, $adresse, $email )
	{
			$connection = Connection::getConnection();

			$firstname = strtoupper($nom);
			$lastname = strtoupper($prenom);
			$user = strtoupper($username);
			$adress = strtoupper($adresse);
			$courriel = strtoupper($email);
			$compagny = strtoupper($nomcompagnie);

			$query = "INSERT INTO  EA_CLIENTS SET (IDCLIENT, NOM, PRENOM, USERNAME, NOMCOMPAGNIE , ADRESSE,EMAIL ) VALUES (:id , :nom , :prenom , :username , :nomcompagnie , :adresse , :email)";
			oci_bind_by_name($statement, ":id", $name);
			oci_bind_by_name($statement, ":nom", $name);
			oci_bind_by_name($statement, ":prenom", $name);
			oci_bind_by_name($statement, ":username", $username);
			oci_bind_by_name($statement, ":nomcompagnie", $nomcompagnie);
			oci_bind_by_name($statement, ":adresse", $adresse);
			oci_bind_by_name($statement, ":email", $email);

			$statement = oci_parse($connection, $query);
		    oci_execute($statement);

			return $statement ;

	}

	}