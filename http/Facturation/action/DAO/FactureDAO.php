<?php


/* ---------------------------------------------------
 *					                  
 *    Projet synthèse : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */


	class FactureDAO {	
		public static function getItemList() {
			$connection = Connection::getConnection();
			$query = "SELECT * FROM EA_FACTURES ORDER BY id";
			$statement = oci_parse($connection, $query);
			
			oci_execute($statement);
			
			$listFacture = array();
			
			while($row = oci_fetch_array($statement)){
				$listFacture[] = $row;
			}
			
			return $listFacture;
		}
		
			/* AJOUT D'UNE FACTURE */
		public static function ajoutItem(){   // A CHECKER
			$connection = Connection::getConnection();
			$query = "INSERT INTO EA_FACTURES (EA_FACTURES_SEQ.nextval , :value1 , :value2 , :value3, :value4, :value5, :DATE, :value7, :value8, :value9, :value10 , :COMPTRECEVOIR)";
			$statement = oci_parse($connection, $query);
			$date = DATE;
			$compte = COMPTRECEVOIR;
			oci_bind_by_name($statement, ":value1", $_POST["repF1"] );
			oci_bind_by_name($statement, ":value2", $_POST["repF2"] );
			oci_bind_by_name($statement, ":value3", $_POST["repF3"] );
			oci_bind_by_name($statement, ":value4", $_POST["repF4"] );
			oci_bind_by_name($statement, ":value5", $_POST["repF5"] );
			oci_bind_by_name($statement, ":DATE", $date );
			oci_bind_by_name($statement, ":value7", $_POST["repF6"] );
			oci_bind_by_name($statement, ":value8", $_POST["repF7"] );
			oci_bind_by_name($statement, ":value9", $_POST["repF8"] );
			oci_bind_by_name($statement, ":value10", $_POST["repF9"] );
			oci_bind_by_name($statement, ":COMPTRECEVOIR", $compte);

			oci_execute($statement);
			return $statement;
		}
		

		public static function modifItem(){
			
		}

		
		public static function deleteItem(){
			$connection = Connection::getConnection(); 
			$query = "DELETE FROM EA_FACTURES WHERE id = :value1";
			$statement = oci_parse($connection, $query);
			
			oci_bind_by_name($statement, ":value1", $_GET["supprimer_id"]);
			oci_execute($statement);
		}


			/* RECHERCHE FACTURE PAR ID DE FACTURE  */
	   public static function rechercheFactureParID($id){
			$idClient = $id; 
			$connection = Connection::getConnection();
			$query = "SELECT * FROM EA_FACTURES WHERE ID = :id";
			$statement = oci_parse($connection, $query);
			oci_bind_by_name($statement, ":id", $id);
			oci_execute($statement);
			$infoFacture = null;
			if ($row = oci_fetch_array($statement))
			{
				//echo "Reussi: recherche FACTURE par ID";
				$infoFacture = array();
				$infoFacture["IDCLIENT"] = $row["IDCLIENT"];
				$infoFacture["NOM"] =  ($idClient);
				$infoFacture["NOMCOMPAGNIE"] = $row["NOMCOMPAGNIE"];
				$infoFacture["ADRESSECOPAGNIE"] = $row["ADRESSECOMPAGNIE"];
				$infoFacture["DESCRIPTION"] = $row["DESCRIPTION"];
				$infoFacture["DATE"] = $row["DATECREATION"];
				$infoFacture["TPS"] = $row["TPS"];
				$infoFacture["TVQ"] = $row["TVQ"];
				$infoFacture["SOUSTOTAL"] = $row["SOUSTOTAL"];
				$infoFacture["TOTAL"] = $row["TOTAL"];
				$infoFacture["COMPTRECEVOIR"] = $row["COMPTRECEVOIR"];
			}
			return json_encode($infoFacture);
	   }

	   /* RECHERCHE FACTURE PAR DATE DE FACTURE  */
	   public static function rechercheFactureParDate($date){
			$idClient = $id; 
			$connection = Connection::getConnection();
			$query = "SELECT * FROM EA_FACTURES WHERE DATE = :date";
			$statement = oci_parse($connection, $query);
			oci_bind_by_name($statement, ":date", $date);
			oci_execute($statement);
			$infoFacture = null;
			if ($row = oci_fetch_array($statement)) 
			{
				//echo "Reussi: recherche FACTURE par ID";
				$infoFacture = array();
				$infoFacture["IDCLIENT"] = $row["IDCLIENT"];
				$infoFacture["NOM"] = rechercheNomClientID($idClient);
				$infoFacture["NOMCOMPAGNIE"] = $row["NOMCOMPAGNIE"];
				$infoFacture["ADRESSECOPAGNIE"] = $row["ADRESSECOPAGNIE"];
				$infoFacture["DESCRIPTION"] = $row["DESCRIPTION"];
				$infoFacture["DATE"] = $row["DATECREATION"];
				$infoFacture["TPS"] = $row["TPS"];
				$infoFacture["TVQ"] = $row["TVQ"];
				$infoFacture["SOUSTOTAL"] = $row["SOUSTOTAL"];
				$infoFacture["TOTAL"] = $row["TOTAL"];
				$infoFacture["COMPTRECEVOIR"] = $row["COMPTRECEVOIR"];
			}
			return $infoFacture;
	   }






			/* RECHERCHE FACTURE PAR NOM  */
		public static function rechercheFactureID($id)
		{
			$idClient = $id; 
			$connection = Connection::getConnection();
			$query = "SELECT * FROM EA_FACTURES WHERE IDCLIENT = :id";
			$statement = oci_parse($connection, $query);
			oci_bind_by_name($statement, ":id", $id);
			oci_execute($statement);
			$infoFacture = null;
			while($row = oci_fetch_array($statement))  // A CHECKER
			{
				//echo "Reussi: recherche FACTURE par ID";
				$infoFacture = array();
				$infoFacture["IDCLIENT"] = $row["IDCLIENT"];
				$infoFacture["NOM"] = rechercheNomClientID($idClient);
				$infoFacture["NOMCOMPAGNIE"] = $row["NOMCOMPAGNIE"];
				$infoFacture["ADRESSECOPAGNIE"] = $row["ADRESSECOPAGNIE"];
				$infoFacture["DESCRIPTION"] = $row["DESCRIPTION"];
				$infoFacture["DATE"] = $row["DATECREATION"];
				$infoFacture["TPS"] = $row["TPS"];
				$infoFacture["TVQ"] = $row["TVQ"];
				$infoFacture["SOUSTOTAL"] = $row["SOUSTOTAL"];
				$infoFacture["TOTAL"] = $row["TOTAL"];
				$infoFacture["COMPTRECEVOIR"] = $row["COMPTRECEVOIR"];
				$row.nextval();
			}
			return $infoFacture;
	   }

	   		/* RECHERCHE FACTURE PAR NOM CLIENT  */
	   	public static function rechercheFactureNom($nom)
	   {
			$idClient = $nom; 
			$connection = Connection::getConnection();
			$query = "SELECT * FROM EA_FACTURES WHERE IDCLIENT = :nom";
			$statement = oci_parse($connection, $query);
			oci_bind_by_name($statement, ":nom", $nom);
			oci_execute($statement);
			$infoFacture = null;
			if ($row = oci_fetch_array($statement)) 
			{
				//echo "Reussi: recherche FACTURE par ID";
				$infoFacture = array();
				$infoFacture["IDCLIENT"] = $row["IDCLIENT"];
				$infoFacture["NOM"] = rechercheNomClient($nom);
				$infoFacture["NOMCOMPAGNIE"] = $row["NOMCOMPAGNIE"];
				$infoFacture["ADRESSECOPAGNIE"] = $row["ADRESSECOPAGNIE"];
				$infoFacture["DESCRIPTION"] = $row["DESCRIPTION"];
				$infoFacture["DATE"] = $row["DATECREATION"];
				$infoFacture["TPS"] = $row["TPS"];
				$infoFacture["TVQ"] = $row["TVQ"];
				$infoFacture["SOUSTOTAL"] = $row["SOUSTOTAL"];
				$infoFacture["TOTAL"] = $row["TOTAL"];
				$infoFacture["COMPTRECEVOIR"] = $row["COMPTRECEVOIR"];
			}
			return $infoFacture;
	   }


	   /**********************************************************
	   			FONCTION DE RECHERCHE DE NOM
		*********************************************************/

			/* RECHERCHE PAR ID  */
	   

			/* RECHERCHE PAR NOM  */
		public static function rechercheFactureClient( $nom)
	   {
			$connection = Connection::getConnection();
			$query = "SELECT * FROM EA_FACTURES WHERE NOM = :nom";
			$statement = oci_parse($connection, $query);
			oci_bind_by_name($statement, ":nom", $nom);
			oci_execute($statement);
			$nomClient = null;
			if ($row = oci_fetch_array($statement)) 
			{
				$nomClient["NOM"] = $row["NOM"] . " " . $row["PRENOM"];
			}
			return $nomClient["NOM"];
		}
		/**********************************************************/
	public function optionFacture( $nom , $reponse , $option, $idClient)
	{
		$connection = Connection::getConnection();
		$name = strtoupper($nom);
		 if( $option == "modifier")
		{
			$query = "UPDATE  EA_FACTURES SET :name = :rep WHERE NO";
			oci_bind_by_name($statement, ":name", $name);
			oci_bind_by_name($statement, ":rep", $reponse);
		}
		else if ($option == "supprimer")
		{
			$query = "DELETE FROM EA_FACTURES WHERE ID = :idCLient";
			oci_bind_by_name($statement, ":id", $idClient);
		}

		$statement = oci_parse($connection, $query);
		oci_execute($statement);
		
		return $statement;
	}


}