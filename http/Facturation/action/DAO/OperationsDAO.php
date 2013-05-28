
<?php 

/* ---------------------------------------------------
 *					                  
 *    Projet synthèse : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */

class OperationsDAO
{


	/**************************************************************
						SECTION ACCUEIL 
	*************************************************************/

	public static function getNbFacture()
	{
		$connection = Connection::getConnection();
		$query = "SELECT COUNT(*) FROM EA_FACTURES";
		$statement = oci_parse($connection, $query);
		oci_execute($statement);
		$nbFacture = null;
			if ($row = oci_fetch_array($statement)) {
				//echo "Reussi";
				$nbFacture = array();
				$nbFacture["nbFacture"] = $row;
			}

			return $nbFacture["nbFacture"];
	}

	public static function getNbClient()
	{
		$connection = Connection::getConnection();
		$query = "SELECT COUNT(*) FROM EA_CLIENTS";
		$statement = oci_parse($connection, $query);
		oci_execute($statement);
		$nbClient = null;
			if ($row = oci_fetch_array($statement)) {
				//echo "Reussi";
				$nbClient = array();
				$nbClient["nbClient"] = $row;
			}

			return $nbClient["nbClient"];
	}

	public static function getNbProjets()
	{

	}

	public static function getCompteRecevoir()
	{
		$connection = Connection::getConnection();
		$query = "SELECT SUM(compte_recevoir) FROM EA_FACTURES";
		$statement = oci_parse($connection, $query);
		oci_execute($statement);
		$ComptRecevoir = null;
			if ($row = oci_fetch_array($statement)) 
			{
				//echo "Reussi";
				$ComptRecevoir = array();
				$ComptRecevoir["comptRecevoir"] = $row;
			}

		return $ComptRecevoir["comptRecevoir"];
	}

	
	

	/**************************************************************
						SECTION FACTURATION
	*************************************************************/




	/**************************************************************
						SECTION RAPPORT
	*************************************************************/

} 