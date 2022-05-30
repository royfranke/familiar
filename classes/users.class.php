<?php
class Users extends Dbh {

/* Remove?
	protected function getUser($user_name) {
		$sql = "SELECT * FROM users WHERE user_name = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$user_name]);
		$results = $stmt->fetch();
		return $results;
	}
	*/

	protected function getUserFromId($user_id) {
		$sql = "SELECT * FROM users WHERE user_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$user_id]);
		$results = $stmt->fetch();
		return $results;
	}

	protected function setUser($user_id,$user_name,$user_email,$user_firstName,$user_lastName) {
		$sql = "UPDATE users SET user_name = ?, user_email = ?, user_firstName = ?, user_lastName = ? WHERE user_id = ? ";
			$stmt = $this->connect()->prepare($sql);
			if (!$stmt->execute([$user_name,$user_email,$user_firstName,$user_lastName,$user_id])) {
				echo 'There was an error changing this user’s information.';
				print_r($stmt->errorInfo());
				$stmt = null;
				exit();
			}
			else {
				echo 0;
			}
	}

	protected function checkUsername($user_name,$user_id) {
		$sql = "SELECT count(*) FROM users WHERE user_name = ? AND user_id != ?";
		$stmt = $this->connect()->prepare($sql);
		if (!$stmt->execute([$user_name,$user_id])) {
			$stmt = null;
			exit();
		}
		$result = $stmt->fetchColumn();
		return $result;
	}

	protected function insertUser($user_name,$user_email,$user_firstName,$user_lastName) {
		$user_created = time();
		$sql = "INSERT INTO users(user_name,user_email,user_firstName,user_lastName,user_last,user_created) VALUES (?,?,?,?,?,?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$user_name,$user_email,$user_firstName,$user_lastName,$user_created,$user_created]);
		print_r($stmt->errorInfo());
	}
}