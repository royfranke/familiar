<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';
echo '<div class="page-block">';
echo '<div class="page-block-label"><h2>My Profile</h2></div>';

$ui = new Ui();
echo '<div class="page-block-body" onchange="unsavedChange()">';
echo '<div class="flex-space-between">';
$ui->input('user-firstname','','','',$user_firstName,'First Name','text');
$ui->input('user-lastname','','','',$user_lastName,'Last Name','text');
echo '</div>';
echo '<div class="flex-space-between">';
$ui->input('user-email','','','',$user_email,'Email','text');
$ui->input('user-name','','','',$user_name,'Username','text');
echo '</div>';
echo '<hr>';
$ui->alertmessage('');
$ui->button('btn-update', 'btn-action', 'updateUser()', 'disabled', 'Save Changes');
echo '</div>';

echo '</div>';

echo '<div class="page-block">';
echo '<div class="page-block-label"><h2>My Settings</h2></div>';
echo '<div class="page-block-body">';
$settings = new SettingsContr($user_id);
$settings->drawSettings('myprints');
echo '</div>';

echo '</div>';