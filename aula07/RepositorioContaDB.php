<?php

require_once 'IRepositorioConta.php';

class RepositorioContaDB implements IRepositorioConta
{
  public $pdo;

  public function __construct( PDO $pdo )
  {
    $this->pdo = $pdo;
  }

  public function cadastrar(Conta $conta)
  {
    try{
      $sql = 'INSERT INTO conta (dono,cpf,senha,saldo) VALUES (?, ?, ?, ?)';
      $ps = $this->pdo->prepare($sql);
      $ps->execute([
        $conta->dono,
        $conta->cpf,
        $conta->meuHash(),
        $conta->saldo
      ]);
    }catch(PDOException $e){
      throw new RepositorioException('Erro no cadastro: ' . $e->getMessage());
    }
  }

  public function listarContas()
  {
    try{
      $sql = 'SELECT * FROM conta';
      $ps = $this->pdo->prepare($sql, [PDO::FETCH_ASSOC]);

      // Opção 1
      $ps->execute();
      $contas = [];
      foreach( $ps as $conta )
      {
        $contas []= new Conta(
          $conta['id'],
          $conta['dono'],
          $conta['cpf'],
          '',
          $conta['saldo']
        );
      }
      // Opção 2
      /*
      $contas = [];
      foreach($obj = $ps->fetchObject()){
        $contas []= new Conta($obj->dono, ...);
      }
      */

      return $contas;

    }catch(PDOException $e){
      throw new RepositorioException('Erro na listagem: ' . $e->getMessage());
    }
  }

  public function depositar()
  {
    $cpf = readline('CPF destino: ');
    $montante = readline('Montante: ');

    try{
      $sql = '';
      //...
    }catch(PDOException $e){
      throw new RepositorioException('Erro no depósito: ' . $e->getMessage());
    }
  }
} //$end




?>