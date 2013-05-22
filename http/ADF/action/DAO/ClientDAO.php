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
			$query = "SELECT * FROM P_AUDITEUR WHERE CODEAUDITEUR = :pUsername AND MOTDEPASSE = :pPassword";
			$statement = oci_parse($connection, $query);
			
			oci_bind_by_name($statement, ":pUsername", $username);
			oci_bind_by_name($statement, ":pPassword", $password);
			oci_execute($statement);
			
			$userInfo = null;
			if ($row = oci_fetch_array($statement)) {
				echo "Reussi";
				$userInfo = array();
				$userInfo["codeauditeur"] = $row["CODEAUDITEUR"];
				$userInfo["visibility"] = $row["ADMIN"];
			}
			
			return $userInfo;
		}


		public static function changePasswd($codeauditeur, $password)
		{
			$connection = Connection::getConnection();
			$query = "UPDATE P_AUDITEUR SET MOTDEPASSE = :mdp WHERE CODEAUDITEUR = :code";
			$statement = oci_parse($connection, $query);
			oci_bind_by_name($statement, ":code", $codeauditeur);
			oci_bind_by_name($statement, ":mdp", $password);
			oci_execute($statement);

			return "Mot de passe changé avec succès !";
		}


		public static function rechercheClientID( $id)
		{
			$connection = Connection::getConnection();
			$query = "SELECT * FROM P_AUDITEUR WHERE ID = :id";
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
	
		
	
		public static function ajouterClient($codeauditeur, $nom, $prenom, $password, $juge, $statut, $candidatjuge, $admin)
		{
			$connection = Connection::getConnection();

			$query = "INSERT INTO P_AUDITEUR (NOCOORD, NOM, PRENOM, CODEAUDITEUR, MOTDEPASSE, STATUT, ADMIN) VALUES (P_SEQ_COORD.NEXTVAL, :nom , :prenom , :codeauditeur , :password, :statut, :admin)";
			$statement = oci_parse($connection, $query);

			oci_bind_by_name($statement, ":codeauditeur", $codeauditeur);
			oci_bind_by_name($statement, ":nom", $nom);
			oci_bind_by_name($statement, ":prenom", $prenom);
			oci_bind_by_name($statement, ":password", $password);
			//oci_bind_by_name($statement, ":juge", $juge);
			oci_bind_by_name($statement, ":statut", $statut);
			//oci_bind_by_name($statement, ":candidatjuge", $candidatjuge);
			oci_bind_by_name($statement, ":admin", $admin);

			oci_execute($statement);
		}

		public static function ajouterCoordClient($rue, $ville, $codepostal, $noregion, $telephone, $cell, $courriel)
		{
			$connection = Connection::getConnection();

			$query = "INSERT INTO P_COORDONNEES (NOCOORD, RUE, VILLE, CODE_POSTAL, NOREGION , TELEPHONE, CELL, COURRIEL) VALUES (P_SEQ_COORD.CURRVAL, :rue , :ville , :codepostal , :noregion , :telephone , :cell, :courriel)";
			$statement = oci_parse($connection, $query);

			oci_bind_by_name($statement, ":rue", $rue);
			oci_bind_by_name($statement, ":ville", $ville);
			oci_bind_by_name($statement, ":codepostal", $codepostal);
			oci_bind_by_name($statement, ":noregion", $noregion);
			oci_bind_by_name($statement, ":telephone", $telephone);
			oci_bind_by_name($statement, ":cell", $cell);
			oci_bind_by_name($statement, ":courriel", $courriel);

			oci_execute($statement);

			return "Nouveau client ajouté avec succès !";
		}
	}