<?php
class SignupContr extends Signup {
	private $user_firstName;
	private $user_lastName;
	private $user_email;
	private $user_name;
	private $user_pwd;

	public function __construct($user_firstName,$user_lastName,$user_email,$user_name,$user_pwd) {
		$this->user_firstName = $user_firstName;
		$this->user_lastName = $user_lastName;
		$this->user_email = $user_email;
		$this->user_name = $user_name;
		$this->user_pwd = $user_pwd;
	}

	private function emptyInput() {
		$result;
		if (empty($this->user_email) || empty($this->user_pwd)) {
			$result = false;
		}
		else {
			$result = true;
		}
		return $result;
	}

	private function invalidUid() {
		$result;
		if (!preg_match("/^[a-zA-Z0-9]*$/", $this->user_name)) {
			$result = false;
		}
		else {
			$result = true;
		}
		return $result;
	}

	private function invalidEmail() {
		$result;
		if (!filter_var($this->user_email,FILTER_VALIDATE_EMAIL)) {
			$result = false;
		}
		else {
			$result = true;
		}
		return $result;
	}

	private function usernameTaken() {
		$result = $this->checkUsername($this->user_name);
		return $result;
	}

	public function signupUser () {
		if ($this->emptyInput() == false) {
			echo 'Please fill in all fields.';
			exit();
		}
		if ($this->usernameTaken() == 1) {
			echo 'This username isn’t available.';
			exit();
		}
		if ($this->invalidEmail() == false) {
			echo 'This email address is invalid.';
			exit();
		}
		$this->setUser($this->user_firstName,$this->user_lastName,$this->user_email,$this->user_name,$this->user_pwd);
	}

}