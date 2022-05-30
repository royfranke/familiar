<?php

class Search extends Dbh {

	protected function getResults($search_term) {
		$sql = "SELECT * FROM foods WHERE description LIKE ? ORDER BY description ASC";
		$stmt = $this->connect()->prepare($sql);
		if (!$stmt->execute(['%'.$search_term.'%'])) {
			$stmt = null;
			exit();
		}
		$result = $stmt->fetchAll();
		return $result;
	}

	protected function getFavorite($user_id,$fdc_id) {
		$sql = "SELECT count(*) FROM fams WHERE user_id = ? AND fdc_id = ? AND fam_removed = 0 LIMIT 1";
		$stmt = $this->connect()->prepare($sql);
		if (!$stmt->execute([$user_id,$fdc_id])) {
			$stmt = null;
			exit();
		}
		$result = $stmt->fetchColumn();
		return $result;
	}

	protected function getFoodImage($user_id,$fdc_id) {
		$sql = "SELECT img_url FROM imgs WHERE fdc_id = ? AND (user_id = ? OR user_id = 1) AND img_removed = 0 ORDER BY user_id DESC, img_active ASC LIMIT 1";
		$stmt = $this->connect()->prepare($sql);
		if (!$stmt->execute([$fdc_id,$user_id])) {
			$stmt = null;
			exit();
		}
		$result = '';
		if ($stmt->rowCount() > 0) {
			$img = $stmt->fetch();
			$result = $img['img_url'];
		}
		return $result;
	}
}