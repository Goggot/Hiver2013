<?php
	class AtelierDAO {
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