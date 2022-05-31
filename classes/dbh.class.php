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

}