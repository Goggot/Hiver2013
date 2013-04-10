<?php

	class UserDAO {	
	
		public static function authenticate($username, $password) {
			$userInfo = null;
			
			if ($username === "derek" && $password === "derek") {
				$userInfo = array();
				$userInfo["username"] = "derek";
				$userInfo["real_name"] = "Derek LaChose";
				$userInfo["visibility"] = 1;
			}
			
			return $userInfo;
		}
	
	
	}