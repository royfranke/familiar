<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'autoloader.inc.php';
if (isset($_POST['user_name']) && isset($_POST['user_pwd'])) {
	$user_name = $_POST['user_name'];
	$user_pwd = $_POST['user_pwd'];

	$login = new LoginContr($user_name,$user_pwd);
	$login->loginUser();
}
else {
	echo 'Username or password not set';
}

