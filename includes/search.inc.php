<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'autoloader.inc.php';
if (isset($_POST['search_term'])) {
	if ($_POST['search_term'] != '') {
		$search = new SearchContr($_POST['user_id'],$_POST['search_term']);
		$search->printResults();
	}
	else {
		$template = new Template();
		$template->render('search-view');
	}
}