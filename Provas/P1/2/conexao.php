<?php

function GET_CONNECTION()
{
	try{
		return new PDO('mysql:server=localhost;dbname=mma;charset=utf8','dev','123456',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	}catch(PDOException $ex) { $ex->getMessage(); die(); }
}