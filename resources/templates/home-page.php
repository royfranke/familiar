<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['view'])) {
	include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';
	$template = new Template();
}
$template->render('app-block',['title'=>'My Prints','id'=>'myprints-block','class'=>'']);
$template->render('app-block',['title'=>'My Foods','id'=>'myfoods-block','class'=>'']);
$template->render('app-block',['title'=>'Search','id'=>'search-block','class'=>'']);