<?php 
include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';

$ui = new Ui();
echo '<div class="blank-state">Search for a food to get started.</div>
	<div class="blank-state-tip"><p>Tap the heart icon on foods you want to add to <span class="interior-link" onclick="scrollToPage(\'myfoods\')">My Foods</span>.</p>';
$ui->iconTip('heart','row-btn-off','row-btn-on');
	echo '</div>';
echo '</div>';

