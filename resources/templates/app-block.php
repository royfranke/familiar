<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';

$ui = new Ui();

if ($title == 'Search') {
	echo '<div id="'.$id.'" class="page-block '.$class.'">
<div class="page-block-label">';
	$ui->input('search-input','search','','autofocus placeholder="Search for foods" onkeyup="searchText()"','','Search','search');

	echo '<button class="btn-icon" onclick="searchText()">'.$ui->icon('search').'</button></div><div class="page-block-body scroll-area-self-detect">';
	echo '</div></div>';
}
else {
	echo '<div id="'.$id.'" class="page-block '.$class.'">
<div class="page-block-label"><h2>'.$title.'</h2><button class="btn-icon" onclick="settings(\''.$id.'\')">'.$ui->icon('settings').'</button></div><div class="page-block-body scroll-area-self-detect"></div></div>';
}
