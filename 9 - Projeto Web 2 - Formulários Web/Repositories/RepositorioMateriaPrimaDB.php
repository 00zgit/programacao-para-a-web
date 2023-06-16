<?php

require_once __DIR__ . '/../Models/MateriaPrima.php';

class RepositorioMateriaPrimaDB
{
  private $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function cadastrar(MateriaPrima $materiaPrima)
  {
    try
    {
      $ps = $this->pdo->prepare('INSERT INTO materia_prima (nome,quantidade,preco,categoria_id,unidade_id) VALUES (?,?,?,?,?)');
      $ps->execute([$materiaPrima->nome,$materiaPrima->quantidade,$materiaPrima->preco,$materiaPrima->categoria,$materiaPrima->unidade]);
    }catch(PDOException $e){
      var_dump($e);
    }
  }

  public function PegarTodasMateriasPrimas()
  {
    try
    {
      $ps = $this->pdo->prepare(
        'SELECT mp.id,mp.nome,mp.quantidade,mp.preco,c.nome AS categoria, u.sigla FROM materia_prima mp INNER JOIN categoria c ON mp.categoria_id = c.id INNER JOIN unidade u ON mp.unidade_id = u.id', [PDO::FETCH_ASSOC]);
      $ps->execute();
      return $ps->fetchAll();
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