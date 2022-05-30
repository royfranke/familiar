<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';
$ui = new Ui();
$template = new Template();

$template->render('login-header');

$template->render('login-view');

$template->render('login-footer');