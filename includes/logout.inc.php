<?php
$_SESSION['logged_in'] = false;
session_start();
session_destroy();