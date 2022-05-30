<?php

class Dbh {
	private $host = 'localhost';
	private $user = '';
	private $pass = '';
	private $dbname = '';

	protected function connect() {
		$ds = 'mysql:host='.$this->host.';dbname='.$this->dbname;
		try {
    		$pdo = new PDO($ds,$this->user,$this->pass);
    	}
		catch(PDOException $e) {
            echo $e->getMessage();
            exit('Database error.');
    	}
    	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    	date_default_timezone_set('US/Eastern');
    	return $pdo;
	}

	protected function makeVulgar ($decimal) {
		$fraction = $decimal;
		switch ($decimal) {
			case 0.875: $fraction = '&frac78;';
			break;
			case 0.75: $fraction = '&frac34;';
			break;
			case 0.625: $fraction = '&frac58;';
			break;
			case 0.5: $fraction = '&frac12;';
			break;
			case 0.375: $fraction = '&frac38;';
			break;
			case 0.25: $fraction = '&frac14;';
			break;
			case 0.125: $fraction = '&frac18;';
			break;
		}
		return $fraction;
	}
}