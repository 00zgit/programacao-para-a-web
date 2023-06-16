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
      $sql = 'SELECT id,dono,cpf,saldo FROM conta';
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

  public function depositar($cpf, $montante)
  {
    try{
      $sql = 'UPDATE conta SET saldo = saldo + ? WHERE cpf = ?';
      $ps = $this->pdo->prepare($sql);
      $ps->execute([$montante,$cpf]);

      if($ps->rowCount() < 1){
        return false;
      }

    }catch(PDOException $e){
      throw new RepositorioException('Erro no depósito: ' . $e->getMessage());
    }

    return true;
  }

  public function transferir($origem,$destino,$montante)
  {
    try{
      $this->pdo->beginTransaction();
      $sql1 = 'UPDATE conta SET saldo = saldo - ? WHERE cpf = ? AND saldo >= ?';
      $sql2 = 'UPDATE conta SET saldo = saldo + ? WHERE cpf = ?';

      $ps = $this->pdo->prepare($sql1);
      $ps->execute([$montante,$origem,$montante]);
      if($ps->rowCount() < 1){
        $this->pdo->rollBack();
        throw new ContaException('Erro: conta origem inexistente ou saldo insuficiente');
      }

      $ps = $this->pdo->prepare($sql2);
      $ps->execute([$montante,$destino]);
      if($ps->rowCount() < 1){
        $this->pdo->rollBack();
        throw new ContaException('Erro: conta destino inexistente');
      }

      $this->pdo->commit();
    }catch(PDOException $e){
      $this->pdo->rollBack();
      throw new RepositorioException('Erro ao realizar a transferência entre contas.', $e->getCode(), $e);
    }

    echo PHP_EOL, 'Sucesso', PHP_EOL;

    return true;
  }
} //$end
?>