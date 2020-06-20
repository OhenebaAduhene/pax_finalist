<?php

	require_once 'config.php';

	try {

		$host = 'mysql:host='.DB_HOST.'; dbname='.DB_NAME;
		$pdo = new PDO($host, DB_USER, DB_PWD);
		
	} catch (Exception $e) {

		die('could not connect to database');
		
	}





?>