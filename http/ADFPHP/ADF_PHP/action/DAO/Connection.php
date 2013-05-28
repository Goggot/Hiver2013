<?php


/* ---------------------------------------------------
 *					                  
 *    Projet synthèse : H2013		        
 *    Fait Par : Erwan Palanque & Augustin Paiement 			        
 *					                   
 *--------------------------------------------------- */
 
 
	class Connection {
		private static $connection;
	
		public static function getConnection(){
			if (!isset(Connection::$connection)){
				Connection::$connection = oci_new_connect(DB_USER, DB_PASS, DB_ALIAS);
			}
			return Connection::$connection;
		}
	
		public static function closeConnection(){
			if (isset(Connection::$connection)){
				oci_close(Connection::$connection);
				Connection::$connection = null;
			}
		}
	}