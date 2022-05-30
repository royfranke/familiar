<?php
class LoginContr extends Login {
	private $user_name;
	private $user_pwd;

	public function __construct($user_name,$user_pwd) {
		$this->user_name = $user_name;
		$this->user_pwd = $user_pwd;
	}

	public function loginUser() {
		$result = $this->checkUser($this->user_name,$this->user_pwd);
		if ($result > 0) {
			session_start();
			$_SESSION['logged_in'] = true;
			$_SESSION['username'] = $this->user_name;
			$_SESSION['user_id'] = $result;
			echo 0;
		}
		else {
			if ($result < 0) {
				echo 'Please try re-entering your username.';
			}
			else {
				echo 'Please try re-entering your password.';
			}
		}
	}

}