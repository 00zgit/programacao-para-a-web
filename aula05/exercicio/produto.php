<?php 
namespace Acme;

require_once 'repositorio_produto.php';

class Produto implements IRepositorioProduto{
  private $nome = '';
  private $codigo = '';
  private $descricao = '';
  private $estoque = 0;
  private $preco = 0.0;
  
  public function __construct($qtd,$cod,$desc,$nome,$val){
    $this->estoque = $qtd;
    $this->codigo = $cod;
    $this->descricao = $desc;
    $this->preco = $val;
    $this->nome = $nome;
  }

  public function getPreco() { return $this->preco; }
  public function setPreco( $valor ) { $this->preco = $valor; } 
  public function getCodigo() { return $this->codigo; }
  public function setCodigo( $valor ) { $this->codigo = $valor; }
  public function getDescricao() { return $this->descricao; }
  public function setDescricao( $valor ) { $this->descricao = $valor; }
  public function getEstoque() { return $this->estoque; }
  public function setEstoque( $valor ) {
    if($valor <= -1){
      throw new Exception("Estoque não pode ser negativo.");
    }
    $this->estoque = $valor;
  }


  function addEstoque( $valor ) {
    $this->setEstoque( $this->getEstoque() + $valor );
  }
  function rmEstoque( $valor ) {
    $this->setEstoque( $this->getEstoque() - $valor );
  }


  function salvar($produtos){
    foreach($produtos as $produtoObj){
      $produtoAsArray = (array) $produtoObj;

      // Obtém o conteúdo do arquivo como string
      $conteudo = @file_get_contents( 'produtos.csv' );
      if ( $conteudo === false ) { // Arquivo não existe
          $conteudo = '';
      }
      // Concatena o novo conteúdo no arquivo como string
      file_put_contents( 'produtos.csv', $conteudo . PHP_EOL .
        $produtoAsArray['estoque']    . ',' .
        $produtoAsArray['codigo']     . ',' .
        $produtoAsArray['descricao']  . ',' .
        $produtoAsArray['preco']      . ',' .
        $produtoAsArray['nome']);
    }
  }
  function carregar() : array{
    return (array) @file_get_contents( 'produtos.csv' );
  }
}

?>