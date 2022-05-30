<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';
$ui = new Ui();
$ui->setPath('../components/');

echo '<div class="flex-space-between">';
$ui->input('user-firstname','','','','','First Name','text');
$ui->input('user-lastname','','','','','Last Name','text');
echo '</div>';

$ui->input('user-email','','','','','Email','text');
$ui->input('user-name','','','','','Username','text');

echo '<div class="flex-space-between">';
$ui->input('user-pwd','','','','','Password','password');
$ui->input('user-repeat','','','','','Re-Type Password','password');
echo '</div>';

echo '<div class="flex-space-between">';
$ui->alertmessage('');
$ui->button('btn-signup','btn-action','signup()','','Sign Up');
echo '</div>';