<?php

class MyPrints extends Dbh {

	protected function getMyPrints($user_id) {
		$sql = "SELECT fams.fdc_id, food_category.food_category_color FROM fams
INNER JOIN foods ON fams.fdc_id = foods.fdc_id 
INNER JOIN food_category ON foods.food_category_id = food_category.food_category_id
WHERE fams.user_id = ? AND (fams.fam_printed = 0 OR fams.fam_reprint = 1) AND fams.fam_removed = 0";
		$stmt = $this->connect()->prepare($sql);
		if (!$stmt->execute([$user_id])) {
			$stmt = null;
			exit();
		}
		$result = $stmt->fetchAll();
		return $result;
	}

	protected function getPastPrints($user_id) {
		$sql = "SELECT print_url,print_created FROM prints WHERE user_id = ? AND print_removed = 0 ORDER BY print_created DESC";
		$stmt = $this->connect()->prepare($sql);
		if (!$stmt->execute([$user_id])) {
			$stmt = null;
			exit();
		}
		$result = $stmt->fetchAll();
		return $result;
	}

	protected function insertPrint ($user_id,$url) {
		$sql = "INSERT INTO prints (user_id,print_url,print_created) VALUES (?,?,?)";
			$stmt = $this->connect()->prepare($sql);

			if (!$stmt->execute([$user_id,$url,time()])) {
				echo 'There was an error recording this print.';
				print_r($stmt->errorInfo());
				$stmt = null;
				exit();
			}
			else {
				echo 0;
			}
	}

	protected function updateFam ($user_id,$cards) {
		for ($i = 0; $i < count($cards); $i++) {
			$sql = "UPDATE fams SET fam_printed = ?, fam_reprint = 0, fam_prints = fam_prints + 1 WHERE user_id = ? AND fdc_id = ?";
			$stmt = $this->connect()->prepare($sql);

			if (!$stmt->execute([time(),$user_id,$cards[$i]])) {
				echo 'There was an error recording this print: '.$cards[$i];
				print_r($stmt->errorInfo());
				$stmt = null;
				exit();
			}
		}
		echo 0;
	}

}

