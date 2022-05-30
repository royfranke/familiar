<?php

class SearchContr extends Search {
	private $search_term;
	private $user_id;
	private $user_data_path;
	public $template;

	public function __construct($user_id,$search_term) {
		$this->search_term = $search_term;
		$this->user_id = $user_id;
		$this->user_data_path = '/user_data/uid_'.$this->user_id.'/';
	}

	public function printResults() {
		$this->template = new Template();
		$row = $this->getResults($this->search_term);
		$results = count($row);
		echo '<div class="page-block-summary">'.$results.' results found for <em>'.$this->search_term.'</em></div>';
		for ($i = 0; $i < $results;$i++) {
			$fav = $this->getFavorite($this->user_id,$row[$i]['fdc_id']);
			$img = $this->getFoodImage($this->user_id,$row[$i]['fdc_id']);
			if ($img != '') {
				$img = $this->user_data_path.$img;
			}
			if ($fav > 0) {
				$fav_class = 'row-btn-on';
			}
			else {
				$fav_class = 'row-btn-off';
			}
			$this->template->render('myfood-result',['fdc_id'=>$row[$i]['fdc_id'],'description'=>$row[$i]['description'],'fav_class'=>$fav_class,'img'=>$img,'print_class'=>'hide']);
		}
		if (count($row) == 0) {
			$this->template->render('search-empty',['search_term'=>$this->search_term]);
		}
	}

}