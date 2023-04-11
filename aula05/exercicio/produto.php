<?php 
namespace Acme;

class Produto{
  public $codigo;
  public $descricao;
  public $estoque;
  public $preco;
  public $nome;
  
  public function __construct($qtd,$cod,$desc,$nome,$valor){
    if($qtd <= -1){
      throw new Exception("Estoque não pode ser negativo.");
    }
    $this->estoque = $qtd;
    $this->codigo = $cod;
    $this->descricao = $desc;
    $this->preco = $valor;
    $this->nome = $nome;
  }
}

?>