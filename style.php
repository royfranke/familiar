<?php

$primary_color = '';
$primary_light_color = '';
$secondary_color = '';
$secondary_light_color = '';

$black_color = '#343a40';
$white_color = '#f8f9fa';

$gray_light_color = '#e9ecef';
$gray_color = '#ced4da';
$gray_dark_color = '#868e96';


$new_color = '#f1cf64';
$new_back_color = '#fffeec';
$negative_color = '#ff6b6b';
$positive_color = '#51cf66';
$disabled_color = '#ced4da';
$warning_color = '#ff922b';
$ready_color = '';
$action_color = '#5c7cfa';


$input_border_color = $gray_light_color;
$focus_border_color = $action_color;
$border_color = $gray_color;
$box_shadow = 'box-shadow: 2px 2px 8px rgba(138,115, 158,.22);';


$normal_text = $black_color;
$light_text = $gray_dark_color;
?>

<style>
	body {
            text-rendering: optimizeLegibility;
            -moz-osx-font-smoothing: grayscale;
            
            font-family: -apple-system, BlinkMacSystemFont, avenir next, avenir, segoe ui, helvetica neue, helvetica, Ubuntu, roboto, noto, arial, sans-serif; 
            font-weight:400;
            font-size: 16px;
            color:<?php echo $normal_text;?>;
            background:#edf2ff;
            margin:0;
            overscroll-behavior: none;
            overflow-x:hidden;

        }
        img {
            max-width:100%;
            max-height:100%;
            width:auto;
            height:auto;
        }

        .hide {
            display:none !important;
        }

        .login-container {
        	max-width:calc(100% - 52px);
        	width:400px;
        	padding:24px;
        	margin:24px auto;
        	border-radius:4px;
        	border: 2px solid <?php echo $border_color; ?>;
             	background:<?php echo $white_color;?>;
        }

        .login-header {
        	display:flex;
        	align-items:center;
        	justify-content: center;
        	padding:24px 0 32px;
        }
        .login-header svg {
        	width:96px;
        	min-width:96px;
        	    background: #fff;
    border-radius: 100%;
        }

        .login-header-title {
        	font-size:18px;
        	font-weight:500;
        	padding:16px;
        	letter-spacing:.25px;
        	color:<?php echo $warning_color;?>
        }


        .login-menu ul {
        	list-style-type: none;
        	padding:0;
        }

        .login-menu ul li {
        	font-size:14px;
        	color:<?php echo $light_text; ?>;
        	margin:4px 8px 8px;
        }

        .login-menu span {
        	color:<?php echo $action_color; ?>;
        	text-decoration:none;
        	border-bottom:1px solid;
        }

        .login-menu span:hover {
            cursor:pointer;
        }

        .login-action {
        	display:flex;
        	justify-content:space-between;
        	align-items:flex-start;
        }

        .alert-message {
            width:90%;
        }
        .alert-message:not(:empty) {
            color: <?php echo $negative_color;?>;
            border-radius:4px;
            font-size: 14px;
            font-weight: 400;
            padding: 8px 16px;
            background: #fff;
            border: 2px solid #ff6b6b;
        }

        .flex-space-between {
            display:flex;
            justify-content:space-between;
            align-items: center;
        }

        .page-container {
        	max-width:calc(100% - 32px);
        	width:1024px;
        	margin:8px auto;
        	border-radius:4px;
        	border: 2px solid <?php echo $border_color; ?>;
             	background:<?php echo $white_color;?>;
            height: calc(100vh - 60px);
        }

        .page-header {
        	display:flex;
        	justify-content: space-between;
            height: 64px;
            max-height: 64px;
        }

        .page-header svg {
            width:24px;
            height:24px;
            min-width:24px;
            min-height:24px;
            fill:<?php echo $action_color;?>;
        }
        .page-nav-left {
        	width:25%;
        	padding:16px;
        }

        .page-nav-left div {
            cursor:pointer;
        }
        .page-nav-left div:hover {
            cursor:pointer;
        }

        .page-nav-title {
        	width:50%;
        	text-align:center;
        	padding:16px;
        	margin:0;
            font-size:18px;
            font-weight:500;
            letter-spacing:.25px;
            color:<?php echo $warning_color;?>
        }

        .page-nav-right {
        	width:25%;
        	padding:16px;
        	text-align: right;
        }

        .page-body {
            position:relative;
            z-index:50;
            width: 100%;
                overflow-x: auto;
                overflow-y: hidden;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            height: calc(100vh - 204px);
        }

/* Hide until settings are ready */
#myfoods-block .page-block-label button {
    display:none;
}

.scroll-snap {
    -webkit-overflow-scrolling: touch;
    scroll-snap-type: x mandatory;
    scroll-snap-destination: 0 0;
}



.page-body > .page-block {
  scroll-snap-align: start;
}
 

        .page-block {
            width: calc(50% - 32px);
  display: inline-block;
    		margin: 0;
    		padding:0 16px;
    scroll-behavior: smooth;
    height: calc(100vh - 204px);
    overflow: hidden;
    position:relative;
        }

        .page-block-label {
        	display:flex;
        	justify-content: space-between;
        	align-items: flex-end;
        	padding: 24px 0 12px;
        	border-bottom:2px solid <?php echo $light_text;?>;
            height: 24px;
            max-height: 24px;
        }

        .page-block h2 {
        	margin:0;
        	font-weight:500;
        	font-size:20px;
        	width:100%;
        }


        .page-block-summary {
            font-size: 14px;
            font-weight:500;
            margin:8px 0 16px;
            text-align:center;
        }

        .page-block-summary em {
            color:<?php echo $action_color;?>;

            margin: 8px 0;
        }

        .page-block-body {
            
    border-radius: 0 0 4px 4px;
    padding-right:16px;
 height: 100%;
        }

        .setting-body {
            display:none;
        }

        .settings-body .page-block-settings {
            display:block;
        }

        .page-block-settings {
            background:<?php echo $gray_light_color;?>;
            padding:16px;
            border-radius: 0 0 4px 4px;
            margin-right:-16px;
            margin-bottom: 16px;
            display:none;
            border:2px inset <?php echo $gray_light_color;?>;
            border-top:0;
        }

.scroll-area-self-detect {
  overflow-y: auto;
  overflow-x: hidden;
  padding-bottom:0;
}


        .result-row {
        	display:flex;
        	justify-content: space-between;
        	align-items: center;
        	min-height:64px;
        	padding:4px 8px;
            margin:8px 4px;
            border-radius:4px;
            background:#fefefe;
            <?php echo $box_shadow;?>
        }

        .row-new {
            border: 2px solid <?php echo $new_color;?>;
            padding:4px 12px;
            border-radius:4px;
            background:<?php echo $new_back_color;?>;
            margin-top:8px;
        }

        .result-name {
        	line-height:1.5em;
                width: 100%;
    padding: 0 12px;
        }

        .result-food-name {
        	font-weight:500;
        	text-transform: capitalize;
            white-space: normal;
        }

        .result-brand-name {
        	color:<?php echo $light_text;?>;
        }

        .print-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .hint-message {
            color:#ff922b;
            margin:8px;
                white-space: normal;
                text-align:right;
        }

        .print-row-page {
            background:#fff;
            display:flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            align-items:center;
            width:110px;
            height:85px;
            margin: 8px 0;
            <?php echo $box_shadow;?>
        }

        .print-row-card {
            width: calc(94px / 4);
            border: 1px dashed <?php echo $light_text;?>;
            border-radius: 4px;
            text-align: center;
            margin: 1px;
            height: 38px;
        }

        .print-row-card div {
            background:<?php echo $action_color; ?>;
            border-radius: 4px;
            color: #fff;
            padding: 4px 2px;
            margin: 1px;
            line-height: 14px;
            font-size: 14px;
        }

        .print-row-card-empty div {
            background:<?php echo $light_text;?>;

        }


        .print-row-info {
            line-height: 18px;
            font-size: 14px;
            display:flex;
            flex-direction:column;
            max-width: calc(100% - 160px);
        }

        .overlay-shadow {
            position:fixed;
            z-index:1000;
            width:100%;
            top:0;
            bottom:0;
            background-color:<?php echo $gray_color;?>;
            background-color:rgba(0,0,0,.25);
        }
        .overlay {
background:<?php echo $white_color;?>;
             max-width: calc(100% - 32px);
    width: 1024px;
    margin: 24px auto;
    border-radius: 4px;
    border: 2px solid #ced4da;

        }

        .overlay-mobile {
            height:0;
            overflow:hidden;
            width:100%;
        }

        .overlay-mobile .preview-card {
margin:auto;
        }

        .overlay-close {
            padding:8px;
        }
        .overlay-close svg {
            width:16px;
            min-width:16px;
            fill: <?php echo $light_text?>;
        }

        .overlay-header {
            display:flex;
            justify-content: space-between;
            align-items:center;
            padding: 16px 24px 0;
            flex-wrap:wrap-reverse;
        }

        .overlay-title h1 {
            font-weight:500;
            margin:16px 0;
            font-size:24px;
            text-transform: capitalize;
        }

        .overlay-actions {
            display:flex;
            justify-content: flex-end;
            align-items:center;
            width:100%;
        }

        .overlay-actions button {
            margin-right:16px;
        }

        .preview-food-image {
            max-height: 70vh;
            border-radius: 4px;
            <?php echo $box_shadow;?>
            max-width: calc(100% - 24px);
        }

        .preview-container {
            width:100%;
            text-align:center;
            margin-bottom:32px;
        }

        .preview-page {
            width: 792px;
            height: 612px;
            margin: 16px auto;
        }

        .preview-card {
            width:100%;
            border:1px dashed <?php echo $border_color;?>;
            height:305px;
        }
        .preview-card-row {
            width:100%;
            display:flex;
            justify-content: space-between;
            align-items:flex-start;
        }
        .preview-card-image {
            background-size: cover;
            background-position: center;
            width: 92%;
            background-color:<?php echo $white_color;?>;
            padding-top: 92%;
            margin: 4%;
            border-radius: 4px;
        }

        .img-bleed {
            width: 100%;
            padding-top: 96%;
            margin: 0 0 4%;
            border-radius: 0;
        }

    .preview-card-name {
        text-transform: capitalize;
        margin: 15% 4% 4%;
    font-size: 18px;
    font-weight: 500;
    text-align: center;

    }

    .card-serving {
        font-size:12px;
        margin: 0;
        color:<?php echo $gray_dark_color; ?>;
        width:calc(100% - 16px);
        
        padding:8px;
        display:flex;
            font-weight:500;
            align-items:center;
            justify-content: space-between;
    }


    .card-serving-size {
            width: 150px;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }


        .card-description {
            font-weight:600;
            padding:4px 8px;
            height:38px;
            width:calc(100% - 16px);
            text-transform: capitalize;
        }

        .card-category:not(:empty) {
            color:#fff;
            padding:6px 8px;
            border-radius: 4px 4px 0 0;
            font-size:12px;
            font-weight:600;
        }

        .preview-card-page {
            width:792px;
            height:612px;
            margin:0 auto 24px;
            background:#fff;
        }

        .row-buttons {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .row-buttons button {
            margin:4px;
        }

        button svg {
            width:16px;
            min-width:16px;
        }

        .row-btn {
            background-size: cover;
                background-position: center;
            min-height:88px;
            min-width:88px;
                display: flex;
    align-items: center;
    justify-content: center;
    fill: <?php echo $action_color; ?>;
    cursor:pointer;
}

.row-btn:hover {
    cursor:pointer;
}


    .result-action .row-btn {
            min-height:48px;
            min-width:48px;
}

.result-time {
    width: 100%;
    margin: 8px;
    line-height: 1.5em;
}

    .result-row:first-child {
    <?php echo $box_shadow;?>
        }

        .row-btn svg {
        	width:16px;
        	min-width:16px;
        	padding:16px;

        }

        .row-btn-on {
        	fill: <?php echo $action_color; ?>;
        }

        .row-btn-off {
        	fill: <?php echo $gray_color; ?>;
        }


        .not-printed {
            fill: <?php echo $gray_color; ?>;
        }
        .printed {
            fill: <?php echo $positive_color; ?>;
        }
        .reprint {
            fill: <?php echo $warning_color; ?>;
        }




        .input-container {
        	display:flex;
        	flex-direction: column-reverse;
        	border: 2px solid <?php echo $input_border_color; ?>;
        	border-radius:4px;
        	padding:4px;
        	margin:8px 0 12px;
        	width: calc(100% - 12px);
            background:#fff
        }


        .flex-space-between .input-container + .input-container {
            margin-left:8px;
        }

        .input-container label {
        	font-size:14px;
        	
        	color:<?php echo $light_text; ?>;
        }

        .input-container input {
        	border:0;
        	-webkit-appearance: none;
		   -moz-appearance: none;
		        appearance: none;
		        background:transparent;
		        font-size:16px;
		    font-family: -apple-system, BlinkMacSystemFont, avenir next, avenir, segoe ui, helvetica neue, helvetica, Ubuntu, roboto, noto, arial, sans-serif;
		    color:<?php echo $action_color; ?>;
        }

        .input-container input:focus {
        	outline:0;
        }

        .input-container:focus-within {
        	border: 2px solid <?php echo $focus_border_color; ?>;
        }


        .search {
            background:transparent;
            display:flex;
            flex-direction: column-reverse;
            border: 0;
            border-radius:4px;
            padding:0;
            margin:0;
            width:100%;
        }

        .search input {
            font-size:20px;
            font-weight:500;
            background:transparent;
        }
        .search label {
            font-size:14px;
            height:0;
            color:transparent;
        }


        .search:focus-within {
        	border: 0;

        }

        .setting-container {
            font-size:15px;
            line-height: 18px;
            margin:8px 0 12px;
        }

        input[type=checkbox] {
            opacity: 0;
            margin: 0 12px 0 -16px;
            cursor:pointer;
        }
        input[type=checkbox] + span:before 
        {
            content: '';
            width:16px;
            height:16px;
            min-width:16px;
            min-height:16px;
            float:left;
        }

        input[type=checkbox]:checked + span:before {
            background-image: url('resources/icons/checked.svg');
        }

        input[type=checkbox]:not(:checked) + span:before {
            background-image: url('resources/icons/unchecked.svg');
        }

        .blank-state {
        	font-size:18px;
        	font-weight:500;
        	color:<?php echo $light_text;?>;
        	margin: 24px 16px 32px;
    		text-align: center;
            white-space: normal;

        }

        .blank-state-tip svg {
            width:16px;
            height:16px;
            min-width:16px;
            min-height:16px;
            padding:4px;
        }

        .blank-state-tip {
            display:flex;
            align-items:center;
            justify-content: space-between;
            fill:<?php echo $light_text;?>;
            border:1px dashed <?php echo $action_color;?>;
            border-radius:4px;
            margin:8px 0 16px;
            background:aliceblue;
        }

        .blank-state-tip p {
            width:100%;
            white-space: normal;
            padding: 16px;
            padding-right:0;
            margin: auto;
            line-height: 1.5em;
        }

        .icon-tip {
            padding: 8px;
            margin: 8px 16px;
            border-radius: 4px;
            background:#fff;
            <?php echo $box_shadow;?>
        }

        .interior-link {
            color: <?php echo $action_color;?>;
            font-weight:600;
            border-bottom:1px solid;
            cursor:pointer;
        }

        .interior-link:hover {
            cursor:pointer;
        }

        .auto-scroll {
        	overflow-y: auto;
        	max-height:50vh;
        }

        button {
        	border:0;
        	-webkit-appearance: none;
		   -moz-appearance: none;
		        appearance: none;
		        white-space: nowrap;
		        font-weight:500;
        	text-transform: uppercase;
        	padding:8px 16px;
        	margin: 4px 0 8px;
        	letter-spacing: .25px;
    		font-size: 16px;
    		border-radius:4px;
            cursor:pointer;
        }

        button:hover {
            cursor:pointer;
        }

        .btn-icon {
            fill:<?php echo $gray_dark_color;?>;
                margin: 0 0 -8px;
            background: transparent;
        }



        .btn-action {
        	background: #fff;
        	color:<?php echo $action_color;?>;
        	border: 2px solid <?php echo $action_color;?>;
        	transition:.25s all;
        }

        .btn-action:hover {
            background:#fefefe;
        	border: 2px solid <?php echo $positive_color;?>;
        	color:<?php echo $positive_color;?>;
        	cursor:pointer;
        }

        .btn-action:active {
        	background:#ffffff;
        	border: 2px solid <?php echo $action_color;?>;
        }

        .btn-action:disabled {
            background: <?php echo $gray_light_color;?>;
            color:<?php echo $gray_dark_color;?>;
            border: 2px solid <?php echo $gray_color;?>;
            transition:.25s all;
        }

        .page-footer {
        	display:flex;
        	align-items:center;
        	justify-content: space-around;
            background:#ffffff;
            z-index:100;
            <?php echo $box_shadow;?>
                height: 74px;
                max-height: 74px;
                    position: fixed;
    width: calc(100% - 32px);
    max-width: 1024px;
        }

        .page-footer-button svg {
        	width:24px;
        	min-width:24px;
            padding:2px 0 ;
        }

        
        .page-footer-button {
        	display:flex;
        	flex-direction: column;
        	align-items:center;
        	padding:16px;
            font-size:14px;
            line-height: 24px;
            white-space: nowrap;
            fill: <?php echo $gray_dark_color;?>; 
            cursor:pointer;
        }

        .page-footer-button:hover {
            fill: <?php echo $warning_color;?>; 
            cursor:pointer;
        }

        .page-footer-active {
            fill: <?php echo $action_color;?>;
        }
   @media only screen and (max-width: 768px) {

    h1.page-nav-title {
        width: 50%;
        text-align: center;
        padding: 8px;
        margin: 0;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: .25px;
        color: #ff922b;
    }

    .page-header {
        height: 50px;
    max-height: 50px;
    }


   	.page-block {
        	width: calc(100% - 32px);
    		margin: 0;
    		padding:0 16px;
        }

        .settings-body .page-block:nth-child(2) {
            display:none;
        }
.page-block h2 {
    font-size: 16px;
}
.flex-space-between .input-container {
    width:calc(50% - 16px);
}

.search input {
    font-size: 16px;
}
    .page-block-label {
        padding: 8px 0;
    }

    .result-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        min-height: 64px;
        padding: 8px;
    }

    .page-container {
    max-width: 100%;
    width: 100%;
    margin: 0;
    border-radius: 0;
}

    .page-footer {
    width: 100%;
        }

    .result-action .row-btn {
        min-height: 48px;
        min-width:48px;
    }

    .overlay-mobile {
            height: 100vh;
        }

   }

</style>