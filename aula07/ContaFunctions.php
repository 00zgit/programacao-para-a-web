<?php

require_once 'Conta.php';
require_once 'IRepositorioConta.php';

class ContaFunctions{
	private $repo;

	function __construct(IRepositorioConta $rep){
		$this->repo = $rep;
	}

  public function CADASTRAR(){
    echo PHP_EOL, 'CADASTRO', PHP_EOL;
    $dono = readline('Dono: ');
    $cpf = readline('CPF: ');
    $senha = readline('Senha: ');
    $saldo = readline('Saldo: ');

    $conta = new Conta(0,$dono,$cpf,$senha,$saldo);

    try{
      $this->repo->cadastrar($conta);
    }catch(RepositorioException $re){
      die('Statement error: ' . $re->getMessage());
    }
  }



  public function LISTAR(){
    echo PHP_EOL, 'LISTAGEM', PHP_EOL;

    try{
      $contas = $this->repo->listarContas();

      foreach( $contas as $conta )
      {
        echo PHP_EOL,
          "[",$conta->id,"] ",
          'Dono: ', $conta->dono, " - ",
          'CPF: ', $conta->cpf, " - ",
          'Saldo: R$', $conta->saldo;
      }

    }catch(RepositorioException $re){
      die('Erro: ' . $re->getMessage());
    }
  }



  public function DEPOSITAR(){
    echo PHP_EOL, 'DEPOSITO', PHP_EOL;

    try{
      $this->repo->depositar();
    }catch(RepositorioException $re){
      die('Erro: ' . $re->getMessage());
    }
  }

}

?>