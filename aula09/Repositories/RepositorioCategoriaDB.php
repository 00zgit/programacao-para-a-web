<?php

require_once __DIR__ . '/../Models/Categoria.php';

class RepositorioCategoriaDB
{
  private $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function cadastrar(Categoria $categoria)
  {
    try
    {
      $ps = $this->pdo->prepare('INSERT INTO categoria (nome) VALUES (?)');
      $ps->execute([$categoria->nome]);
    }catch(PDOException $e){
      var_dump($e);
    }
  }

  public function PegarTodasCategorias()
  {
    try
    {
      $ps = $this->pdo->prepare('SELECT * FROM categoria', [PDO::FETCH_ASSOC]);
      $ps->execute();
      return $ps->fetchAll();
    }catch(PDOException $e){
      var_dump($e);
    }
  }

  public function delete($id)
  {
    try {
      $ps = $this->pdo->prepare('DELETE * FROM categoria WHERE id = ?');
      $ps->execute([$id]);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }
}

?>