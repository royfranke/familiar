<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';
$ui = new Ui();

echo '<div id="preview-overlay" class="overlay-shadow" style="display:none;"><div class="overlay"><div class="overlay-header">
<div class="overlay-actions">
	<div class="overlay-buttons"><button class="btn-action" onclick="createPage(1,1)">Print</button></div>
	<div class="overlay-close" onclick="closeOverlay(\'preview-overlay\')">'.$ui->icon('close').'</div>
</div>
</div><div class="overlay-mobile"></div>
<div class="overlay-body"></div></div></div>';

echo '<div id="preview-image-overlay" class="overlay-shadow" style="display:none;"><div class="overlay"><div class="overlay-header">
<div class="overlay-title"></div>
<div class="overlay-actions">
	<div class="overlay-buttons"><button id="replace-image" class="btn-action" onclick="">Replace Image</button></div>
	<div class="overlay-close" onclick="closeOverlay(\'preview-image-overlay\')">'.$ui->icon('close').'</div>
</div>
</div>
<div class="overlay-body"></div></div></div>';