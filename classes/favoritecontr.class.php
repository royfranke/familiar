<?php

class FavoriteContr extends Favorite {
	private $user_id;
	private $fdc_id;
	private $new_state;

	public function __construct($user_id,$fdc_id,$new_state) {
		$this->user_id = $user_id;
		$this->fdc_id = $fdc_id;
		$this->new_state = $new_state;
	}

	public function setFavorite() {
		$this->updateFavorite($this->user_id,$this->fdc_id,$this->new_state);
	}

}