<?php

class Favorite extends Dbh {

	protected function updateFavorite($user_id,$fdc_id,$new_state) {
		$sql = "SELECT * FROM fams WHERE user_id = ? AND fdc_id = ?";
		$stmt = $this->connect()->prepare($sql);
		if (!$stmt->execute([$user_id,$fdc_id])) {
			$stmt = null;
			exit();
		}
		if ($stmt->rowCount() == 0 && $new_state == 1) {
			$sql = "INSERT INTO fams (user_id,fdc_id,fam_created) VALUES (?,?,?)";
			$stmt = $this->connect()->prepare($sql);

			if (!$stmt->execute([$user_id,$fdc_id,time()])) {
				echo 'There was an error creating this favorite.';
				print_r($stmt->errorInfo());
				$stmt = null;
				exit();
			}
		}
		else {
			
			if ($new_state == 0) {
				$fam_removed = time();
			}
			else {
				$fam_removed = 0;
			}
			$sql = "UPDATE fams SET fam_removed = ? WHERE user_id = ? AND fdc_id = ?";
			$stmt = $this->connect()->prepare($sql);
			if (!$stmt->execute([$fam_removed,$user_id,$fdc_id])) {
				echo 'There was an error creating this favorite.';
				print_r($stmt->errorInfo());
				$stmt = null;
				exit();
			}
		}
	}

}