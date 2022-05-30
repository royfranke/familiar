<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'autoloader.inc.php';
if (isset($_POST['user_id']) && isset($_POST['cards'])) {
	$preview = new MyPrintsContr($_POST['user_id']);
	$preview->recordFoodPrint($_POST['cards']);
}
else {
	//preview-empty.php
}