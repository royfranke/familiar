<?php
//['id'=>$id,'value'=>$value,'label'=>$label]
$checked = '';
if ($value == 1) {
	$checked = 'checked';
}
echo '<div class="setting-container" onchange="changeSetting(\''.$id.'\')"><input id="'.$id.'" type="checkbox" '.$checked.'><span>'.$label.'</span></div>';