<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'autoloader.inc.php';

if (isset($_POST['user_id']) && isset($_POST['settings_id'])) {
	$template = new Template();
	$template->render('settings');

	$settings = new SettingsContr($_POST['user_id']);
	$settings->drawSettings($_POST['settings_id']);
}