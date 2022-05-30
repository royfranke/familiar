<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'autoloader.inc.php';
if (isset($_POST['fdc_id']) && isset($_POST['user_id']) && isset($_POST['new_state'])) {
	$reprint = new ReprintContr($_POST['user_id'],$_POST['fdc_id'],$_POST['new_state']);
	$reprint->setReprint();
}