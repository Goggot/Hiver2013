<?php

	class UserDAO {	
	
		public static function authenticate($username, $password) {
			$connection = oci_new_connect("r3frederic", "test", "DECINFO");
			
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
			
			oci_close($connection);
			
			return $userInfo;
		}
	
	
	}
	
	
	
	
	
	
	
	
	
	
	