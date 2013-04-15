
<?php
	require_once("action/CommonAction.php");
 	
	class ProduitAction extends CommonAction {
	
	public function __construct(){
		parent::__construct(CommonAction::$VISIBILITY_ADMIN);
	}
	
	
	
	
		public function executeAction()
		{
			$connection = Connection::getConnection(); 
			
			$query = " SELECT * FROM PRODUIT_PHP";
			$statement = oci_parse($connection, $query);
			oci_execute($statement);			
			
			$listProduit = array();
			
			while($row = oci_fetch_array($statement))
			{
				$listProduit[] = $row;
				
			}
			
			return $listProduit;
		}
	
	
	}