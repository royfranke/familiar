<?php
spl_autoload_register(function ($className) {
	$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	if (strpos($url,'includes') !== false) {
		$path = "../classes/";
	}
	else {
		$path = $_SERVER['DOCUMENT_ROOT'].'/classes/';
	}
	$path = $_SERVER['DOCUMENT_ROOT'].'/classes/';

	$ext = ".class.php";
	$fullPath = $path.strtolower($className).$ext;

	require_once $fullPath;
});
