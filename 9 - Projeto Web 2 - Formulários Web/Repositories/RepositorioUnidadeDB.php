<?php

require_once __DIR__ . '/../Models/Unidade.php';

class RepositorioUnidadeDB
{
  private $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function PegarTodasUnidades()
  {
    try
    {
      $ps = $this->pdo->prepare('SELECT * FROM unidade', [PDO::FETCH_ASSOC]);
      $ps->execute();
      return $ps->fetchAll();
    }catch(PDOException $e){
      var_dump($e);
    }
  }

  public function cadastrar(Unidade $unidade)
  {
    try
    {
      $ps = $this->pdo->prepare('INSERT INTO unidade (descricao,sigla) VALUES (?,?)');
      $ps->execute([$unidade->nome,$unidade->sigla]);
    }catch(PDOException $e){
      var_dump($e);
    }
  }
}

?>