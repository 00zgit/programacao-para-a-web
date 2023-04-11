<?php
namespace cefet; // Útil para não conflitar bibliotecas
require_once 'namespace2.php';  // classes de um mesmo namespace não precisam de 'use'

class Aluno{
  public $nome = '';
  public $turma = null;

  public function __construct($nome,Turma $turma){
    $this->nome = $nome;
    $this->turma = $turma;
  }
}
?>