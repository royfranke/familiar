<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'autoloader.inc.php';

if (isset($_POST['user_id'])) {
	$user = new UsersContr();
	$user->GetUserProfile($_POST['user_id']);
}

