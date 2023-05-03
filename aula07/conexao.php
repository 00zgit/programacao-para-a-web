<?php

function GET_CONNECTION()
{
	try{
		$options =
		[
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_PERSISTENT => true
		];

		$pdo = null;
		$pdo = new PDO
		(
			'mysql:host=localhost;dbname=banco;port=3306;charset=UTF8', 
			'root', '', 
			$options
		);

		return $pdo;

	}catch(PDOException $e){
		die('Connection error: ' . $e->getMessage());
	}
	
	echo PHP_EOL, "Connected to database", PHP_EOL;
}

?>