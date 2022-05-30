<?php

class Settings extends Dbh {

	protected function getUserSettings($user_id) {
		$sql = "SELECT * FROM settings WHERE user_id = ? LIMIT 1";
		$stmt = $this->connect()->prepare($sql);
		if (!$stmt->execute([$user_id])) {
			$stmt = null;
			exit();
		}
		if ($stmt->rowCount() == 0) {
			///If  user settings don't exist, create them
			$sql = "INSERT INTO settings (user_id) VALUES (?)";
			$stmt = $this->connect()->prepare($sql);
			if (!$stmt->execute([$user_id])) {
				echo 'There was an error creating this user’s settings.';
				print_r($stmt->errorInfo());
				$stmt = null;
				exit();
			}
			else {
				$sql = "SELECT * FROM settings WHERE user_id = ? LIMIT 1";
				$stmt = $this->connect()->prepare($sql);
				if (!$stmt->execute([$user_id])) {
					$stmt = null;
					exit();
				}
			}
		}

		$result = $stmt->fetch();
		return $result;
	}

	protected function updateSetting ($user_id,$setting,$value) {
		$sql = "UPDATE settings SET $setting = ? WHERE user_id = ? ";
		$stmt = $this->connect()->prepare($sql);
		if (!$stmt->execute([$value,$user_id])) {
			echo 'There was an error changing this setting.';
			print_r($stmt->errorInfo());
			$stmt = null;
			exit();
		}
	}
}

