<?php
	class ClientDAO {
		public static function authenticate($username, $password){
			$connection = Connection::getConnection();
			$query = "SELECT * FROM P_AUDITEUR WHERE CODEAUDITEUR = :pUsername AND MOTDEPASSE = :pPassword";
			$statement = oci_parse($connection, $query);
			
			oci_bind_by_name($statement, ":pUsername", $username);
			oci_bind_by_name($statement, ":pPassword", $password);
			oci_execute($statement);
			
			$userInfo = null;
			if ($row = oci_fetch_array($statement)) {
				$userInfo = array();
				$userInfo["codeauditeur"] = $row["CODEAUDITEUR"];
				$userInfo["visibility"] = $row["ADMIN"];
			}
			
			return $userInfo;
		}


		public static function changePasswd($codeauditeur, $password){
			$connection = Connection::getConnection();
			$query = "UPDATE P_AUDITEUR SET MOTDEPASSE = :mdp WHERE CODEAUDITEUR = :code";
			$statement = oci_parse($connection, $query);
			oci_bind_by_name($statement, ":code", $codeauditeur);
			oci_bind_by_name($statement, ":mdp", $password);
			oci_execute($statement);

			return "Mot de passe changé avec succès !";
		}


		public static function rechercheAvancee($date, $langue, $titre, $any){
			$connection = Connection::getConnection();
			$val = null;
			if ($any == 'Any')
				$val = 'OR';
			else
				$var = 'AND';

			if (isset($date) && !isset($titre) && !isset($langue)){
				$query = "SELECT * FROM P_ATELIER WHERE DATEATEL = :dateAtel";
				$statement = oci_parse($connection, $query);
				oci_bind_by_name($statement, ":dateAtel", $date);
			}
			if (isset($date) && isset($titre) && !isset($langue)){
				$query = "SELECT * FROM P_ATELIER WHERE DATEATEL = :dateAtel " . $val . " TITRE = :titre";
				$statement = oci_parse($connection, $query);
				oci_bind_by_name($statement, ":dateAtel", $date);
				oci_bind_by_name($statement, ":titre", $titre);
			}
			if (!isset($date) && isset($titre) && !isset($langue)){
				$query = "SELECT * FROM P_ATELIER WHERE TITRE = :titre";
				$statement = oci_parse($connection, $query);
				oci_bind_by_name($statement, ":titre", $titre);
			}
			if (!isset($date) && isset($titre) && isset($langue)){
				$query = "SELECT * FROM P_ATELIER WHERE LANGUE = :langue " . $val . " TITRE = :titre";
				$statement = oci_parse($connection, $query);
				oci_bind_by_name($statement, ":langue", $langue);
				oci_bind_by_name($statement, ":titre", $titre);
			}
			if (!isset($date) && !isset($titre) && isset($langue)){
				$query = "SELECT * FROM P_ATELIER WHERE LANGUE = :langue";
				$statement = oci_parse($connection, $query);
				oci_bind_by_name($statement, ":langue", $langue);
			}
			if (isset($date) && !isset($titre) && isset($langue)){
				$query = "SELECT * FROM P_ATELIER WHERE LANGUE = :langue " . $val . " DATEATEL = :dateatel";
				$statement = oci_parse($connection, $query);
				oci_bind_by_name($statement, ":langue", $langue);
				oci_bind_by_name($statement, ":dateatel", $date);
			}
			if (isset($date) && isset($titre) && isset($langue)){
				$query = "SELECT * FROM P_ATELIER WHERE LANGUE = :langue " . $val . " DATEATEL = :dateatel " . $val . " TITRE = :titre";
				$statement = oci_parse($connection, $query);
				oci_bind_by_name($statement, ":langue", $langue);
				oci_bind_by_name($statement, ":dateatel", $date);
				oci_bind_by_name($statement, ":titre", $titre);
			}

			oci_execute($statement);

			$infoClients = null;
			if ($row = oci_fetch_array($statement)){
				$infoClients = array();
				$infoClients["NOATEL"] = $row["NOATEL"];
				$infoClients["NOEXPO"] = $row["NOEXPO"];
				$infoClients["TITRE"] = $row["TITRE"];
				$infoClients["LANGUE"] = $row["LANGUE"];
				$infoClients["DATEATEL"] = $row["DATEATEL"];
				$infoClients["CREEPAR"] = $row["CREEPAR"];
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