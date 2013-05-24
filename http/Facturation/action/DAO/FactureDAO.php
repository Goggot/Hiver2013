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
		
		public static function ajoutItem(){
			$connection = Connection::getConnection();
			$query = "INSERT INTO EA_FACTURES (EA_FACTURES_SEQ.nextval , :value1 , :value2 , :value3, :value4, :value5, :value6, :value7, :value8)";
			$statement = oci_parse($connection, $query);

			oci_bind_by_name($statement, ":value1", $_POST["idClient"] );
			oci_bind_by_name($statement, ":value2", $_POST["nomCompagnie"] );
			oci_bind_by_name($statement, ":value3", $_POST["description"] );
			oci_bind_by_name($statement, ":value4", $_POST["date"] );
			oci_bind_by_name($statement, ":value5", $_POST["tps"] );
			oci_bind_by_name($statement, ":value6", $_POST["tvq"] );
			oci_bind_by_name($statement, ":value7", $_POST["sousTotal"] );
			oci_bind_by_name($statement, ":value8", $_POST["total"] );

			oci_execute($statement);
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
	}