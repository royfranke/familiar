<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';
$template = new Template();
echo '<div class="page-block-summary">Organizing your foods...</div>';
$template->render('myfood-result',['fdcid'=>'','description'=>'','fav_class'=>'row-btn-off','img'=>-1]);

