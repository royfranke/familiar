<?php
class Login extends Dbh {

	protected function checkUser($user_name,$user_pwd) {
		$sql = "SELECT user_id,user_pwd FROM users WHERE user_name = ? LIMIT 1";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$user_name]);
		if ($stmt->rowCount() > 0) {
			$user = $stmt->fetchAll();
			$checkPwd = password_verify($user_pwd,$user[0]['user_pwd']);
			if (!$checkPwd) {$result = 0;} // Incorrect Password
			else {$result = $user[0]['user_id'];} // Correct Password
		}
		else {
			$result = -1; // Username not found
		}
		$stmt = null;
		return $result;
	}
}