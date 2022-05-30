<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'autoloader.inc.php';
if (isset($_POST['user_id']) && isset($_POST['cards'])) {
	$preview = new MyFoodsContr($_POST['user_id']);
	$preview->printMyFoodCards($_POST['cards']);
}
else {
	// Loading view
	$preview = new MyFoodsContr(-1);
	$preview->printLoadingCards();
}