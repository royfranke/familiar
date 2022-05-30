<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/autoloader.inc.php';


echo '</div>
<div class="login-menu">
    <ul>
    <li class="hide" data-view="login">Already signed up? <span onclick="viewLoginMenu(\'login\')">Log in</span></li>
    <li data-view="signup">No login? <span onclick="viewLoginMenu(\'signup\')">Sign up for free</span></li>
    </ul>
    </div></div>';


    /*
<li data-view="resetpwd">No password? <span onclick="viewLoginMenu(\'resetpwd\')">Reset your password</span></li>
    <li data-view="requestusername">No username? <span onclick="viewLoginMenu(\'requestusername\')">Request your username</span></li>

    */