<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';

$ui = new Ui();

echo '<div class="blank-state">You don’t have any cards to print.</div>
	<div class="blank-state-tip"><p><span class="interior-link" onclick="scrollToPage(\'search\')">Search foods</span> and tap the heart icon on foods you want to print cards for.</p>';
$ui->iconTip('heart','row-btn-off','row-btn-on');
	echo '</div>
<div class="blank-state-tip"><p>
You can select cards to reprint in <span class="interior-link" onclick="scrollToPage(\'myfoods\')">My Foods</span> by tapping the printer icon.</p>';
$ui->iconTip('print','printed','reprint');
echo '</div>';