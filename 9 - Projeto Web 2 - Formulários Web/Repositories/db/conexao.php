<?php

function GET_CONNECTION()
{
  return new PDO('mysql:host=localhost:3306;dbname=aula09;charset=utf8','root','',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}

?>