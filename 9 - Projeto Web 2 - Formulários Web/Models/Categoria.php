<?php

class Categoria
{
  public $id;
  public $nome;

  public function __construct(int $id, string $nome)
  {
    $this->id = $id;
    $this->nome = $nome;
  }
}

?>