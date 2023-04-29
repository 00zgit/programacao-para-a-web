<?php

require_once 'Conta.php';
require_once 'RepositorioContaDB.php';
require_once 'conexao.php';

function CADASTRAR(){
  echo 'CADASTRO', PHP_EOL;
  $dono = readline('Dono: ');
  $cpf = readline('CPF: ');
  $senha = readline('Senha: ');
  $saldo = readline('Saldo: ');

  $conta = new Conta($dono,$cpf,$senha,$saldo);

  try{
    $pdo = GET_CONNECTION();
    $repo = new RepositorioContaDB($pdo);
    $repo->cadastrar($conta);
  }catch(RepositorioException $re){
    die('Statement error: ' . $re->getMessage());
  }

  echo PHP_EOL, "Sucesso Cadastro";
}


?>