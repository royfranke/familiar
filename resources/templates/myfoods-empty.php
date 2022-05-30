<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';

$ui = new Ui();
echo '<div class="blank-state">You don’t have any saved foods.</div>
	<div class="blank-state-tip"><p><span class="interior-link" onclick="scrollToPage(\'search\')">Search foods</span> and tap the heart icon on foods you want to add to My Foods.</p>';
$ui->iconTip('heart','row-btn-off','row-btn-on');
	echo '</div>';
echo '</div>';