<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';
$ui = new Ui();
$template = new Template();

$template->render('app-preview');
$template->render('app-header',['left'=>'<div onclick="loadSettings()">'.$ui->icon('settings').'</div>','right'=>'','title'=>'Familiar Food Finder']);

$template->render('home-page');

$template->render('app-footer');