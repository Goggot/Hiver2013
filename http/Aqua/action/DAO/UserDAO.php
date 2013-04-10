<?php

	class UserDAO {	
	
		public static function authenticate($username, $password) {
			$userInfo = null;
			
			if ($username === "pouet" && $password === "Gainsbar91") {
				$userInfo = array();
				$userInfo["username"] = "Pouet";
				$userInfo["real_name"] = "Pouet LaChose";
				$userInfo["visibility"] = 3;
			}
			
			return $userInfo;
		}
	
	
	}