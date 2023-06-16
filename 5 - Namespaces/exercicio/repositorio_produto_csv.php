<?php
require_once 'repositorio_produto.php';
require_once 'produto.php';

use Acme\Produto;

class RepositorioProdutoCSV implements RepositorioProduto {
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