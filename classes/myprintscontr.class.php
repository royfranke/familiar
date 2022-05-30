<?php

class MyPrintsContr extends MyPrints {
	private $user_id;
	private $per_page;
	private $pdf_path;
	private $pdf_url;
	public $template;

	public function __construct($user_id) {
		$this->user_id = $user_id;
		$this->per_page = 8;
		$this->pdf_path = $_SERVER['DOCUMENT_ROOT'].'/user_data/uid_'.$this->user_id.'/';
		$this->pdf_url = '/user_data/uid_'.$this->user_id.'/pdf/';
		$this->checkDataDir();
	}

	public function printPast() {
		$past_prints = $this->getPastPrints($this->user_id);
		$this->template = new Template();
		echo '<div class="page-block-summary"><span class="interior-link" onclick="loadView(\'myprints\')">View your upcoming prints.</span></div>';
		for ($i=0; $i < count($past_prints); $i++) {

			$url = $this->pdf_url.$past_prints[$i]['print_url'];
			$time = date('l, m/d/y<\b\r>\a\t h:ia',$past_prints[$i]['print_created']);
			$this->template->render('past-row',['url'=>$url,'time'=>$time]);
		}
	}

	public function printResults() {

		$this->template = new Template();
		$card = $this->getMyPrints($this->user_id);
		$card_count = count($card);
		$page_total = $card_count / $this->per_page;
		$page_count = floor($page_total);
		$pages = array();
		for ($c = 0; $c < $card_count; $c++) {
			if (count($pages) == 0) {
	            $pages[] = array();
	        }
	        end($pages);
	        $page = key($pages);
	        if (count($pages[$page]) == $this->per_page) {
	            array_push($pages, array());
	            end($pages);
	            $page = key($pages);
	        }
	        $pages[$page][] = [$card[$c]['fdc_id'],$card[$c]['food_category_color']];
		}
		$past_prints = $this->getPastPrints($this->user_id);
		$view_past_prints = '';
		if (count($past_prints) > 0) {
			$view_past_prints = ' <span class="interior-link" onclick="showPastPrints()">View your past prints &#10132;</span>';
		}
		echo '<div class="page-block-summary">You have <em>'.$card_count.'</em> cards to print.'.$view_past_prints.'</div>';
		if (count($card) != 0) {
			for ($i = 0; $i < count($pages); $i++) {
				$this->template->render('myprints-row',['this_page'=>$i,'pages'=>$pages,'per_page'=>$this->per_page]);
			}
		}
		else {
			$this->template->render('myprints-empty');
		}
	}

	public function recordPrint ($file) {
		$filename = $file["data"]["name"];
		$save_file_as = $this->pdf_path.'pdf/'.$filename;
		if(!empty($file['data'])) {
		    $content = file_get_contents($file['data']['tmp_name']);
			if (move_uploaded_file($file['data']['tmp_name'], $save_file_as)) {
				$this->insertPrint($this->user_id,$filename);
			}
			else {
				echo 'Error saving PDF.';
			}

		} else {
		    throw new Exception("no data");
		}
	}

	public function recordFoodPrint ($cards) {
		$this->updateFam($this->user_id,$cards);
	}

	private function checkDataDir() {
		if (!file_exists($this->pdf_path)) {
			mkdir($this->pdf_path);
		}
		if (!file_exists($this->pdf_path.'/pdf/')) {
			mkdir($this->pdf_path.'/pdf/');
		}
	}

}