<?php
	class ProduitDAO {	
		public static function getItemList() {
			$connection = Connection::getConnection();
			$query = " SELECT * FROM PRODUIT_PHP ORDER BY id";
			$statement = oci_parse($connection, $query);
			
			oci_execute($statement);
			
			$listProduit = array();
			
			while($row = oci_fetch_array($statement)){
				$listProduit[] = $row;
			}
			
			return $listProduit;
		}
		
		public static function ajoutItem(){
			$connection = Connection::getConnection();
			$query = "INSERT INTO PRODUIT_PHP (ID,NOM,DESCRIPTION,PRIX) VALUES (SEQUENCE_PHP.nextval , :value1 , :value2 , :value3)";
			$statement = oci_parse($connection, $query);

			oci_bind_by_name($statement, ":value1", $_POST["champNomProduit"] );
			oci_bind_by_name($statement, ":value2", $_POST["champDesc"] );
			oci_bind_by_name($statement, ":value3", $_POST["champPrix"] );

			oci_execute($statement);
		}
		
		public static function modifItem(){
			
		}
		
		public static function deleteItem(){
			$connection = Connection::getConnection(); 
			$query = "DELETE FROM PRODUIT_PHP WHERE id = :value1";
			$statement = oci_parse($connection, $query);
			
			oci_bind_by_name($statement, ":value1", $_GET["supprimer_id"]);
			oci_execute($statement);
		}
	}