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
		public static function ajoutItem($facture){   // A CHECKER
			$connection = Connection::getConnection();
			$query = "INSERT INTO EA_FACTURES (EA_FACTURES_SEQ.nextval , :value1 , :value2 , :value3, :value4, :value5, :value6, :value7, :value8, :value9, :value10, :value11)";
			$statement = oci_parse($connection, $query);
			$tab = array();
			$tab = json_decode($facture); 
			$date = date("d/m/y");
		
			$COMPTRECEVOIR = 0;

			oci_bind_by_name($statement, ":value1", $tab[0] );//1
			oci_bind_by_name($statement, ":value2", $tab[1] );//2
			oci_bind_by_name($statement, ":value3", $tab[2] );//3
			oci_bind_by_name($statement, ":value4", $tab[3] );//4
			oci_bind_by_name($statement, ":value5", $date);//5
			oci_bind_by_name($statement, ":value6", $tab[4] );//6
			oci_bind_by_name($statement, ":value7", $tab[5] );//7
			oci_bind_by_name($statement, ":value8", $tab[6]);//8
			oci_bind_by_name($statement, ":value9", $tab[7] );//9
			oci_bind_by_name($statement, ":value10", $COMPTRECEVOIR);//10
			oci_bind_by_name($statement, ":value11", $COMPTRECEVOIR);//11
			oci_execute($statement);
			return $statement;
		}
		

		public static function modifItem( $table, $id)
		{
			$connection = Connection::getConnection();
			$tablo = array();
			$tablo= json_decode($table);
			$idClient = $id;
			$nomcompagnie = $tablo[0];
			$adresse = $tablo[1];
			$desc = $tablo[2];
			$date = $tablo[3];
			$tps = $tablo[4];
			$tvq = $tablo[5];
			$soustotal = $tablo[6];
			$total = $tablo[7];
			$montant=$tablo[8];
			$compterecevoir=$tablo[9];
			
			$query = "UPDATE EA_CLIENTS SET  nomcompagnie = :rep1, adresse = :rep2, description = :rep3, tps = :rep4 , tvq = :rep5, soustotal = :rep6 , total = :rep7 ,  montant = :rep8, compterecevoir = :rep9 WHERE id = :idClient";
			$statement = oci_parse($connection, $query);
			oci_bind_by_name($statement, ":rep1", $nomcompagnie);
			oci_bind_by_name($statement, ":rep2", $adresse);
			oci_bind_by_name($statement, ":rep3", $desc);
			oci_bind_by_name($statement, ":rep4", $date);
			oci_bind_by_name($statement, ":rep5", $tps);
			oci_bind_by_name($statement, ":rep6", $tvq);
			oci_bind_by_name($statement, ":rep7", $soustotal);
			oci_bind_by_name($statement, ":rep8", $total);
			oci_bind_by_name($statement, ":rep9", $montant);
			oci_bind_by_name($statement, ":rep10", $compterecevoir);
			oci_bind_by_name($statement, ":idClient", $idClient);
			oci_execute($statement);
			return ($statement);
		}

		
		public static function deleteItem( $id){
			$connection = Connection::getConnection(); 
			$val = $id ;
			$query = "DELETE FROM EA_FACTURES WHERE ID = :value1";
			$statement = oci_parse($connection, $query);	
			oci_bind_by_name($statement,":value1", $val);
			oci_execute($statement);
		}


			/* RECHERCHE FACTURE PAR ID DE FACTURE  */
	   public static function rechercheFactureParID($id){
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
				$infoFacture["NOMCOMPAGNIE"] = $row["NOMCOMPAGNIE"];
				$infoFacture["ADRESSECOMPAGNIE"] = $row["ADRESSECOMPAGNIE"];
				$infoFacture["DESCRIPTION"] = $row["DESCRIPTION"];
				$infoFacture["DATECREATION"] = $row["DATECREATION"];
				$infoFacture["TPS"] = $row["TPS"];
				$infoFacture["TVQ"] = $row["TVQ"];
				$infoFacture["SOUSTOTAL"] = $row["SOUSTOTAL"];
				$infoFacture["TOTAL"] = $row["TOTAL"];
				$infoFacture["COMPTE_RECEVOIR"] = $row["COMPTE_RECEVOIR"];
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
				$infoFacture["NOM"] = rechercheFactureClient($idClient);
				$infoFacture["NOMCOMPAGNIE"] = $row["NOMCOMPAGNIE"];
				$infoFacture["ADRESSECOMPAGNIE"] = $row["ADRESSECOMPAGNIE"];
				$infoFacture["DESCRIPTION"] = $row["DESCRIPTION"];
				$infoFacture["DATE"] = $row["DATECREATION"];
				$infoFacture["TPS"] = $row["TPS"];
				$infoFacture["TVQ"] = $row["TVQ"];
				$infoFacture["SOUSTOTAL"] = $row["SOUSTOTAL"];
				$infoFacture["TOTAL"] = $row["TOTAL"];
				$infoFacture["COMPTE_RECEVOIR"] = $row["COMPTE_RECEVOIR"];
			}
			return json_encode($infoFacture);
	   }






			/* RECHERCHE FACTURE PAR NOM  */
		public static function rechercheFactureID($id)
		{
			$connection = Connection::getConnection();
			$query = "SELECT * FROM EA_FACTURES WHERE ID = :id";
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
				$infoFacture["ADRESSECOMPAGNIE"] = $row["ADRESSECOMPAGNIE"];
				$infoFacture["DESCRIPTION"] = $row["DESCRIPTION"];
				$infoFacture["DATECREATION"] = $row["DATECREATION"];
				$infoFacture["TPS"] = $row["TPS"];
				$infoFacture["TVQ"] = $row["TVQ"];
				$infoFacture["SOUSTOTAL"] = $row["SOUSTOTAL"];
				$infoFacture["TOTAL"] = $row["TOTAL"];
				$infoFacture["COMPTE_RECEVOIR"] = $row["COMPTE_RECEVOIR"];
				$row.nextval();
			}
			return json_encode($infoFacture);
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
				$infoFacture["ADRESSECOMPAGNIE"] = $row["ADRESSECOMPAGNIE"];
				$infoFacture["DESCRIPTION"] = $row["DESCRIPTION"];
				$infoFacture["DATE"] = $row["DATECREATION"];
				$infoFacture["TPS"] = $row["TPS"];
				$infoFacture["TVQ"] = $row["TVQ"];
				$infoFacture["SOUSTOTAL"] = $row["SOUSTOTAL"];
				$infoFacture["TOTAL"] = $row["TOTAL"];
				$infoFacture["COMPTE_RECEVOIR"] = $row["COMPTE_RECEVOIR"];
			}
			return json_encode($infoFacture);
	   }


	   /**********************************************************
	   			FONCTION DE RECHERCHE DE NOM
		*********************************************************/

			/* RECHERCHE PAR ID  */
	   

			/* RECHERCHE PAR NOM  */
		public static function rechercheFactureClient( $id)
	   {
			$connection = Connection::getConnection();
			$query = "SELECT NOM , PRENOM FROM EA_CLIENTS WHERE ID = :id";
			$statement = oci_parse($connection, $query);
			oci_bind_by_name($statement, ":id", $id);
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