<?php

class LookupContr extends Lookup {

	public function getByCategory($category_id) {
		$group = array();
		$row = $this->getCategory($category_id);
		for ($i = 0; $i < count($row); $i++) { 
			$this_row = array(
				'lookup_value'=>$row[$i]['lookup_value'],
				'lookup_desc'=>$row[$i]['lookup_desc'],
				'lookup_label'=>$row[$i]['lookup_label']
			);
			array_push($group, $this_row);
		}
		return $group;
	}

	public function getCategoriesByLabel($label) {
		$group = array();
		$row = $this->getCategoryId($label);
		for ($i = 0; $i < count($row); $i++) { 
			$results = $this->getByCategory($row[$i]['lookup_value']);
			array_push($group, $results);
		}
		return $group;
	}
}
