<?php

class Signup extends Dbh {

	protected function checkUsername($user_name) {
		$sql = "SELECT count(*) FROM users WHERE user_name = ?";

		$stmt = $this->connect()->prepare($sql);
		if (!$stmt->execute([$user_name])) {
			$stmt = null;
			exit();
		}
		$result = $stmt->fetchColumn();
		return $result;
	}

	protected function setUser($user_firstName,$user_lastName,$user_email,$user_name,$user_pwd) {
		$sql = "INSERT INTO users (user_firstName,user_lastName,user_email,user_name,user_pwd,user_last,user_created) VALUES (?,?,?,?,?,?,?)";
		$stmt = $this->connect()->prepare($sql);
		$hashedPwd = password_hash($user_pwd,PASSWORD_DEFAULT);
		if (!$stmt->execute([$user_firstName,$user_lastName,$user_email,$user_name,$hashedPwd,time(),time()])) {
			echo 'There was an error setting up this user.';
			print_r($stmt->errorInfo());
			$stmt = null;
			exit();
		}
		$login = new LoginContr($user_name,$user_pwd);
		$login->loginUser();
	}
}	