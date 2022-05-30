<?php

class Uploads extends Dbh {

	protected function saveImg($user_id,$fdc_id,$filename) {
		$sql = "INSERT INTO imgs (user_id,fdc_id,img_url,img_created,img_createdby,img_active) VALUES (?,?,?,?,?,?)";
		$stmt = $this->connect()->prepare($sql);
		if (!$stmt->execute([$user_id,$fdc_id,$filename,time(),$user_id,time()])) {
			echo 'There was an error saving the image URL.';
			print_r($stmt->errorInfo());
			$stmt = null;
			exit();
		}
		else {
			echo 0;
		}
	}

}

