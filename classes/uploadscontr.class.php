<?php

class UploadsContr extends Uploads {
	private $user_id;
	private $fdc_id;
	private $file;
	private $data_path;

	public function __construct($data) {
		$this->file = $data['file'];
		$ids = explode('-',$this->file['name']);
		$this->user_id = $ids[0];
		$this->fdc_id = $ids[1];
		$this->data_path = '/var/www/html/user_data/uid_'.$this->user_id.'/';
	}

	public function uploadImg() {
		$this->checkFileError();
		$this->checkDataDir();
		$moved = move_uploaded_file($this->file['tmp_name'], $this->data_path . $this->file['name']);
		if ($moved) {
			$this->saveImg($this->user_id,$this->fdc_id,$this->file['name']);
		}
		else {
			echo "There was an error moving this file.";
		}
	}

	public function checkFileError() {
		if ($this->file['error'] > 0) {
			switch ($this->file['error']) {
	    		case 1: $this_error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
	    		break;
	    		case 2: $this_error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
	    		break;
	    		case 3: $this_error = 'The uploaded file was only partially uploaded';
	    		break;
	    		case 4: $this_error = 'No file was uploaded';
	    		break;
	    		case 5: $this_error = ''; //Success
	    		break;
	    		case 6: $this_error = 'Missing a temporary folder';
	    		break;
	    		case 7: $this_error = 'Failed to write file to disk.';
	    		break;
	    		case 8: $this_error = 'A PHP extension stopped the file upload.';
	    		break;
	    	}
	    	echo $this_error;
	    	exit;
		}
	}

	private function checkDataDir() {
		if (!file_exists($this->data_path)) {
			mkdir($this->data_path);
		}
	}

}