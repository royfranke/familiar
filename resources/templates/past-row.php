<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';
$ui = new Ui();
// ['url'=>$url,'time'=>$time]
echo '<div class="past-print-row result-row">';
        echo '<div class="result-time">'.$time.'</div>';
        echo '<div class="result-action"><a href="'.$url.'" download><div class="row-btn row-btn-on">'.$ui->icon('download').'</div></div></a>
        <div class="result-action"><a href="'.$url.'"><div class="row-btn">'.$ui->icon('view').'</div></a></div>';
echo '</div>';