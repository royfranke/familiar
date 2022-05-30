<?php

class MyFoodsContr extends MyFoods {
	private $user_id;
	private $per_page;
	public $template;

	public function __construct($user_id) {
		$this->user_id = $user_id;
		$this->template = new Template();
		$this->per_page = 8;
	}

	public function printMyFoodRows() {
		$row = $this->getMyFoods($this->user_id);
		$results = count($row);
		echo '<div class="page-block-summary">You have <em>'.$results.'</em> foods saved</div>';
		for ($i = 0; $i < count($row);$i++) {
			if ($row[$i]['fam_reprint'] != 0) {
				$printed = 'reprint';
			}
			else {
				if ($row[$i]['fam_printed'] != 0) {
					$printed = 'printed';
				}
				else {
					$printed = 'not-printed';
				}
			}
			if ($row[$i]['friendly'] != '') {
				$description = $row[$i]['friendly'];
			}
			else {
				$description = $row[$i]['description'];
			}
			$this->printMyFoodRow($row[$i]['fdc_id'],$description,$printed);
		}
		if (count($row) == 0) {
			$this->template->render('myfoods-empty');
		}
	}

	public function printMyFoodRow($fdc_id,$description,$print_class) {
		$img = $this->getFoodImage($this->user_id,$fdc_id);
		$this->template->render('myfood-result',['fdc_id'=>$fdc_id,'description'=>$description,'fav_class'=>'row-btn-on','print_class'=>$print_class,'img'=>$img]);
	}

	public function printMyFoodCards($cards) {
		$card_count = count($cards);
		echo '<div id="print-page-1" class="preview-page"><div class="preview-card-row">';
		for ($i = 0; $i < $this->per_page;$i++) {
			if ($i == floor($this->per_page/2)) {
				echo '</div><div class="preview-card-row">';
			}
			if (isset($cards[$i])) {
				$this->printMyFoodCard($cards[$i]);
			}
			else {
				$this->printMyFoodSlot();
			}
		}
		if ($card_count == 0) {
			$this->template->render('preview-empty');
		}
		echo '</div></div>';
	}

	public function printMyFoodCard($fdc_id) {
		$img = $this->getFoodImage($this->user_id,$fdc_id);
		$data = $this->getFoodCardData($this->user_id,$fdc_id);

		$this->template->render('myfoods-card',['fdc_id'=>$fdc_id,'img'=>$img,'img_class'=>$data['img_class'],'description'=>$data['description'],'food_category'=>$data['category'],'food_category_color'=>$data['color'],'serving'=>$data['serving'],'grams'=>$data['grams']]);
	}

	public function printMyFoodSlot() {
		$this->template->render('myfoods-empty-card');
	}

	public function printLoadingCards() {
		echo '<div class="preview-page"><div class="preview-card-row">';
		for ($i = 0; $i < $this->per_page;$i++) {
			if ($i == floor($this->per_page/2)) {
				echo '</div><div class="preview-card-row">';
			}
			$this->printLoadingCard();
		}
		echo '</div></div>';
	}

	public function printLoadingCard() {
		$this->template->render('myfoods-card',['fdc_id'=>'','img'=>'','img_class'=>'loading-image','description'=>'Loading...','food_category'=>'Preparing your cards...','food_category_color'=>'fefefe','serving'=>'','grams'=>'']);
	}

}