<?php

include 'Categoria.php';

class MateriaPrima
{
  public $id;
  public $nome;
  public $quantidade;
  public $preco;
  public $categoria;

  public function __construct(int $id,string $nome,int $quantidade,float $preco, Categoria $categoria)
  {
    $this->id = $id;
    $this->nome = $nome;
    $this->quantidade = $quantidade;
    $this->preco = $preco;
    $this->categoria = $categoria;
  }
}

?>