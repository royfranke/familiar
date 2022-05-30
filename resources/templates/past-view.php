<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';

$ui = new Ui();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$myprints = new MyPrintsContr($_POST['user_id']);
$myprints->printPast();

