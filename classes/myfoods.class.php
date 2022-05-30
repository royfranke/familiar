<?php

class MyFoods extends Dbh {
	private $settings;

	protected function getMyFoods($user_id) {
		$sql = "SELECT fams.fdc_id, fams.fam_reprint, fams.fam_printed, foods.description, foods.friendly, food_category.food_category_desc, food_category.food_category_color FROM fams INNER JOIN foods ON fams.fdc_id = foods.fdc_id INNER JOIN food_category ON foods.food_category_id = food_category.food_category_id WHERE fams.user_id = ? AND fams.fam_removed = 0 ORDER BY foods.friendly ASC, foods.description ASC";
		$stmt = $this->connect()->prepare($sql);
		if (!$stmt->execute([$user_id])) {
			$stmt = null;
			exit();
		}
		$result = $stmt->fetchAll();
		return $result;
	}

	protected function getFoodImage($user_id,$fdc_id) {
		$sql = "SELECT img_url, user_id FROM imgs WHERE fdc_id = ? AND (user_id = ? OR user_id = 1) AND img_removed = 0 ORDER BY user_id DESC, img_active ASC LIMIT 1";
		$stmt = $this->connect()->prepare($sql);
		if (!$stmt->execute([$fdc_id,$user_id])) {
			$stmt = null;
			exit();
		}
		$result = '';
		if ($stmt->rowCount() > 0) {
			$img = $stmt->fetch();
			$result = '/user_data/uid_'.$img['user_id'].'/'.$img['img_url'];
		}
		return $result;
	}

	protected function getFoodDescr($fdc_id,$s_category) {
		$sql = "SELECT foods.description, foods.friendly, food_category.food_category_desc, food_category.food_category_color FROM foods INNER JOIN food_category ON foods.food_category_id = food_category.food_category_id WHERE foods.fdc_id = ?";
		$stmt = $this->connect()->prepare($sql);
		if (!$stmt->execute([$fdc_id])) {
			$stmt = null;
			exit();
		}
		$result = array('','','cccccc');
		if ($stmt->rowCount() > 0) {
			$row = $stmt->fetch();
			if ($row['friendly'] != '') {
				$result[0] = $row['friendly'];
			}
			else {
				$result[0] = $row['description'];
			}
			if ($s_category == 1) {
				$result[1] = $row['food_category_desc'];
				$result[2] = $row['food_category_color'];
			}
			
		}
		return $result;
	}

	protected function getFoodPortion($fdc_id,$s_vulgar,$s_grams,$s_serving) {
		$sql = "SELECT food_portion.amount, food_portion.portion_grams, food_unit.unit_desc FROM food_portion INNER JOIN food_unit ON food_portion.unit_id = food_unit.unit_id WHERE food_portion.fdc_id = ? AND food_portion.seq_num = 1";
		$stmt = $this->connect()->prepare($sql);
		if (!$stmt->execute([$fdc_id])) {
			$stmt = null;
			exit();
		}
		$result = array('','');
		if ($stmt->rowCount() > 0) {
			$row = $stmt->fetch();
			if ($s_serving == 1) {
				if ($s_vulgar == 0) {
					$result[0] = (float)$row['amount'].' '.$row['unit_desc'];
				}
				else {
					$result[0] = $this->makeVulgar((float)$row['amount']).' '.$row['unit_desc'];
				}
			}
			if ($s_grams == 1) {
				$result[1] = (float)$row['portion_grams'].'g';
			}
		}
		return $result;
	}

	protected function getFoodCardData($user_id,$fdc_id) {
		$this->settings = new SettingsContr($user_id);
		$settings = $this->settings->getMySettings();
		$descr = $this->getFoodDescr($fdc_id,$settings['s_category']);
		$portion = $this->getFoodPortion($fdc_id,$settings['s_vulgar'],$settings['s_grams'],$settings['s_serving']);
		$img_class = '';
		if ($settings['s_bleed'] > 0) {
			$img_class = 'img-bleed';
		}
		$result = array(
			'description'=>$descr[0],
			'category'=>$descr[1],
			'color'=>$descr[2],
			'serving'=>$portion[0],
			'grams'=>$portion[1],
			'img_class'=>$img_class
		);
		return $result;
	}

}

