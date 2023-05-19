<?php

function GET_CONNECTION()
{
  return new PDO('mysql:dbname=aula08;host=localhost:3306;charset=utf8', 
    'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}

?>