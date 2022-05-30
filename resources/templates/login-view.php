<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';
$ui = new Ui();

$ui->input('user-name','','','','','Username','text');
$ui->input('user-pwd','','','','','Password','password');

echo '<div class="flex-space-between">';
$ui->alertmessage('');
$ui->button('btn-login','btn-action','login()','','Log In');
echo '</div>';
