<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';
$ui = new Ui();

if ($img != '') {
    $onclick = 'onclick="viewImage(\''.$img.'\',\''.$fdc_id.'\');" style="background-image:url(\''.$img.'\');"';
    $icon = '';
    if ($img == -1) {
    	$onclick = '';
    }
}
else {
    $onclick = 'onclick="$(\'#image-browse\').attr(\'fdcid\',\''.$fdc_id.'\');$(\'#image-browse\').click();" class="row-btn"';
    $icon = $ui->icon('camera');
}

echo '<div class="result-row" fdcid="'.$fdc_id.'">
        <button '.$onclick.' class="row-btn">'.$icon.'</button>
        <div class="result-name"><div class="result-food-name">'.$description.'</div></div>
        <div class="result-action result-action-print" onclick="togglePrintAction(\''.$fdc_id.'\')"><div class="row-btn '.$print_class.'">'.$ui->icon('print').'</div></div>
        <div class="result-action result-action-menu" onclick="toggleMenuAction(\''.$fdc_id.'\')"><div class="row-btn '.$fav_class.'">'.$ui->icon('heart').'</div></div>
        </div>';
