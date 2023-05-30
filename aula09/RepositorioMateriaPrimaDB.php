<?php



class RepositorioMateriaPrimaDB
{
  private $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function cadastrar($nome, $quantidade, $preco, $categoriaId, $unidadeId)
  {
    try
    {
      $ps = $this->pdo->prepare('INSERT INTO materia_prima (nome,quantidade,preco,categoria_id,unidade_id) VALUES (?,?,?,?,?)');
      $ps->execute([$nome,$quantidade,$preco,$categoriaId,$unidadeId]);
    }catch(PDOException $e){
      var_dump($e);
    }
  }

  public function PegarTodasMateriasPrimas()
  {
    try
    {
      $ps = $this->pdo->prepare(
        'SELECT * FROM materia_prima mp', [PDO::FETCH_ASSOC]);
      $ps->execute();
      return $ps->fetchAll(); // POO e converter os ids em objetos!!!
    }catch(PDOException $e){
      var_dump($e);
    }
  }

  public function update()
  {
    
  }

  public function delete($id)
  {
    try {
      $ps = $this->pdo->prepare('DELETE FROM materia_prima WHERE id = ?');
      $ps->execute([$id]);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }
}

?>