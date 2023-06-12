<?php

class MateriaPrima
{
  public $id;
  public $nome;
  public $quantidade;
  public $preco;
  public $categoria;
  public $unidade;

  public function __construct(int $id,string $nome,int $quantidade,float $preco, int $categoria, int $unidade)
  {
    $this->id = $id;
    $this->nome = $nome;
    $this->quantidade = $quantidade;
    $this->preco = $preco;
    $this->categoria = $categoria;
    $this->unidade = $unidade;
  }
}

?>