<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';
$template = new Template();
echo '<div class="page-block-summary">Searching...</div>';
$template->render('myfood-result',['fdc_id'=>'','description'=>'','fav_class'=>'row-btn-off','img'=>-1]);

