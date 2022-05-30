<?php

include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';

$ui = new Ui();
$ui->input('user-email','','','','','Email','text');
$ui->button('btn-send','btn-action','sendUsername()','','Get Username');
