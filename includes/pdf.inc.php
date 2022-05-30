<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'autoloader.inc.php';

$file = $_FILES;
$file_name = $file["data"]["name"];
$parts = explode('-', $file_name);
$user_id = $parts[0];
$print = new MyPrintsContr($user_id);
$print->recordPrint($file);