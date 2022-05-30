<?php
// ['this_page'=>$this_page,'pages'=>$pages,'per_page'=>$per_page]
echo '<div class="print-row result-row" page="'.$this_page.'"><div class="print-row-page">';
        for ($c = 0; $c < count($pages[$this_page]); $c++) {
            echo '<div class="print-row-card" fdcid="'.$pages[$this_page][$c][0].'" ><div style="background-color:#'.$pages[$this_page][$c][1].'">'.(1+$c).'</div></div>';
        }
        $more_space = '';
        if (count($pages[$this_page]) != $per_page) {
        	$spot_remaining = $per_page -count($pages[$this_page]);
            for ($c = 0; $c < $spot_remaining; $c++) {
                echo '<div class="print-row-card print-row-card-empty"><div>&#x2715;</div></div>';
            }
            $more_space = '<div class="hint-message">You have space for '.$spot_remaining.' more card(s).</div>';
        }
        echo '</div>';
        echo '<div class="print-row-info">'.$more_space.'<div class="row-buttons"><button class="btn-action"  onclick="previewPrintPage('.($this_page).')">Preview</button></div></div>';
        echo '</div>';