<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'autoloader.inc.php';
if (isset($_POST['user_id']) && isset($_POST['setting']) && isset($_POST['value'])) {
$settings = new SettingsContr($_POST['user_id']);
$settings->changeSetting($_POST['setting'],$_POST['value']);
}
