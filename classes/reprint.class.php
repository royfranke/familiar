<?php

class Reprint extends Dbh {

	protected function updateReprint($user_id,$fdc_id,$new_state) {
		$sql = "UPDATE fams SET fam_reprint = ? WHERE user_id = ? AND fdc_id = ?";
		$stmt = $this->connect()->prepare($sql);
		if (!$stmt->execute([$new_state,$user_id,$fdc_id])) {
			echo 'There was an error handling this reprint.';
			print_r($stmt->errorInfo());
			$stmt = null;
			exit();
		}
		else {
			echo 0;
		}
	}
}
