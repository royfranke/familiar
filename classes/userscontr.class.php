<?php
class UsersContr extends Users {

	public function createUser($user_name,$user_email,$user_firstName,$user_lastName) {
		$this->insertUser($user_name,$user_email,$user_firstName,$user_lastName);
	}

	public function updateUser($user_id,$user_name,$user_email,$user_firstName,$user_lastName) {
		if ($this->checkUsername($user_name,$user_id) == true) {
			echo 'This username isn’t available.';
			exit();
		}
		if ($this->invalidEmail($user_email) == false) {
			echo 'This email address is invalid.';
			exit();
		}
		$this->setUser($user_id,$user_name,$user_email,$user_firstName,$user_lastName);
	}

	public function GetUserProfile($user_id) {
		$user = $this->getUserFromId($user_id);
		$template = new Template();
		$template->render('profile',['user_firstName'=>$user['user_firstName'],'user_lastName'=>$user['user_lastName'],'user_email'=>$user['user_email'],'user_name'=>$user['user_name'],'user_id'=>$user_id]);
	}

	private function invalidEmail($user_email) {
		$result;
		if (!filter_var($user_email,FILTER_VALIDATE_EMAIL)) {
			$result = false;
		}
		else {
			$result = true;
		}
		return $result;
	}

}