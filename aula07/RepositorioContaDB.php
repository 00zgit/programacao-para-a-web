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
      $sql = 'INSERT INTO conta (dono,cpf,senha,saldo) VALUES ?, ?, ?, ?';
      $ps = $this->pdo->prepare($sql);
      $ps->execute([
        $conta->dono,
        $conta->cpf,
        $conta-> meuHash( $conta->senha ),
        $conta->saldo
      ]);
    }catch(PDOException $e){
      throw new RepositorioException('Erro no cadastro ', $e->getMessage());
    }
  }

  public function listarContas()
  {
    try{
      $sql = 'SELECT dono,cpf,saldo FROM conta;';
      $ps = $this->pdo->prepare($sql, [PDO::FETCH_ASSOC]);
      $registros = $ps->execute();
      
      $contas = [];
      foreach( $registros as $conta )
      {
        $conta []= new Conta(
          $conta['dono'],
          $conta['cpf'],
          '',
          $conta['saldo']
        );
      }

      return $contas;

    }catch(PDOException $e){
      throw new RepositorioException('Erro na listagem ', $e->getMessage());
    }
  }

  public function depositar()
  {
    $cpf = readline('CPF destino: ');
    $cpf = readline('Senha destino: ');
    $montante = readline('Montante: ');

    try{
      $sql = '';
      //...
    }catch(PDOException $e){
      throw new RepositorioException('Erro no depósito ', $e->getMessage());
    }
  }

  public function meuHash($string)
  {
    return hash('sha256', $string . '##SUPER_SECRET_SALT##');
  }
} //$end




?>