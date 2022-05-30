<?php

echo '<div class="preview-card" fdcid="'.$fdc_id.'"><div class="card-category" style="background-color:#'.$food_category_color.'">'.$food_category.'</div><div class="preview-card-image '.$img_class.'" style="background-image:url(\''.$img.'\');"></div><div class="preview-card-info">
<div class="card-description">'.$description.'</div>

<div class="card-serving">
	<div>
		<div class="card-serving-size">'.$serving.'</div>
	</div>
		<div class="card-grams">'.$grams.'</div>
</div>
	</div></div>';
