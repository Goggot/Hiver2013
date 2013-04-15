<?php
	

	class UserDAO {	
	
		public static function authenticate($username, $password) {
			$connection = Connection::getConnection();
			
			$password = sha1($password);
			
			$query = "SELECT * FROM USERS WHERE USERNAME = :pUsername AND PASSWORD = :pPassword";
			$statement = oci_parse($connection, $query);
			
			oci_bind_by_name($statement, ":pUsername", $username);
			oci_bind_by_name($statement, ":pPassword", $password);
			
			oci_execute($statement);
			
			$userInfo = null;
			
			if ($row = oci_fetch_array($statement)) {
				$userInfo = array();
				$userInfo["username"] = $row["USERNAME"];
				$userInfo["real_name"] =  $row["FIRST_NAME"] . " " . $row["LAST_NAME"];
				$userInfo["visibility"] = $row["VISIBILITY"];
			}
			
			return $userInfo;
		}	

		public static function getUserList() {
			$connection = Connection::getConnection();
			
			$password = sha1($password);
			
			$query = "SELECT * FROM USERS";
			$statement = oci_parse($connection, $query);
			
			
			oci_execute($statement);
			
			$userList = array();
			
			while ($row = oci_fetch_array($statement)) {
				$userList[] = $row;
			}
			
			return $userList;
		}
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	