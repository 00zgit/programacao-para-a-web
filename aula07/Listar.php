<?php

require_once 'Conta.php';
require_once 'RepositorioContaDB.php';
require_once 'conexao.php';

function LISTAR(){
  echo 'LISTAGEM', PHP_EOL;

  try{
    $pdo = GET_CONNECTION();
    $repo = new RepositorioContaDB($pdo);
    $contas = $repo->listarContas($conta);

    foreach($contas as $conta)
    {
      echo 'Dono: ', $conta->dono, PHP_EOL,
      'CPF: ', $conta->cpf, PHP_EOL,
      'Saldo: R$', $conta->saldo, PHP_EOL;
    }

  }catch(RepositorioException $re){
    die('Statement error: ' . $re->getMessage());
  }

  echo PHP_EOL, "Sucesso Cadastro";
}


?>