<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';
$ui = new Ui();
echo '</div><div class="page-footer">';
$ui->footerbutton('logout()','logout','Log Out','btn-logout','');
$ui->footerbutton('scrollToPage(\'myprints\')','print','Print','btn-myprints','');
$ui->footerbutton('scrollToPage(\'myfoods\')','home','Home','btn-myfoods','');
$ui->footerbutton('scrollToPage(\'search\')','search','Search','btn-search','');
echo '</div></div>';

