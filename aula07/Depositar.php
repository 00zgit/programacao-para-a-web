<?php

require_once 'Conta.php';
require_once 'RepositorioContaDB.php';
require_once 'conexao.php';

function DEPOSITAR(){
  echo 'DEPOSITO', PHP_EOL;

  try{
    $pdo = GET_CONNECTION();
    $repo = new RepositorioContaDB($pdo);
    $repo->depositar();

  }catch(RepositorioException $re){
    die('Statement error: ' . $re->getMessage());
  }

  echo PHP_EOL, "Sucesso", PHP_EOL;
}


?>