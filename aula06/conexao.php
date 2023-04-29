<?php

namespace acme;

function GET_CONNECTION()
{
	$options =
	[
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_PERSISTENT => true
	];

	$pdo = null;

	try{
		$pdo = new PDO
		(
			'mysql:host=localhost;dbname=acme;port=3308;charset=UTF8', 
			'root', '', 
			$options
		);
	}catch(PDOException $e){
		die('Connection error: ' . $e->getMessage());
	}

	echo "Connection successful";
	
}

?>