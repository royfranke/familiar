<?php

class Lookup extends Dbh {

	protected function getCategory($category_id) {
		$sql = "SELECT * FROM lookup WHERE lookup_category = ? ORDER BY lookup_id ASC";
		$stmt = $this->connect()->prepare($sql);
		if (!$stmt->execute([$category_id])) {
			$stmt = null;
			exit();
		}
		$result = $stmt->fetchAll();
		return $result;
	}

	protected function getCategoryId($label) {
		$sql = "SELECT lookup_value FROM lookup WHERE lookup_category = 0 AND lookup_label = ? ORDER BY lookup_category ASC";
		$label = 'settings-'.$label;
		$stmt = $this->connect()->prepare($sql);
		if (!$stmt->execute([$label])) {
			$stmt = null;
			exit();
		}
		$result = $stmt->fetchAll();
		return $result;
	}
}