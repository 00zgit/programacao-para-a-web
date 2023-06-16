<?php

class Unidade
{
  public $id;
  public $nome;
  public $sigla;

  public function __construct(int $id,string $nome,string $sigla)
  {
    $this->id = $id;
    $this->nome = $nome;
    $this->sigla = $sigla;
  }
}

?>