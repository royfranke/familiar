<?php

class SettingsContr extends Settings {
	private $user_id;
	public $ui;
	public $lookup;

	public function __construct($user_id) {
		$this->user_id = $user_id;
		$this->ui = new Ui();
		$this->lookup = new LookupContr();
	}

	public function changeSetting($setting,$value) {
		$change_setting = $this->updateSetting($this->user_id,$setting,$value);
		return $change_setting;
	}

	public function getMySettings() {
		$my_settings = $this->getUserSettings($this->user_id);
		return $my_settings;
	}

	public function drawSettings($label) {
		$settings = $this->lookup->getCategoriesByLabel($label);
		$my_settings = $this->getUserSettings($this->user_id);
		for ($i=0; $i < count($settings[0]); $i++) {
			$this_value = $my_settings[$settings[0][$i]['lookup_value']];
			$this->ui->setting($this_value,$settings[0][$i]['lookup_value'],$settings[0][$i]['lookup_label']);
		}
	}

	public function getMyPrintSettings() {
		$this->getMySettings('myprints');
	}
}