<?php

interface IImpressora{
  function Imprime($string);
}

class ImpressoraConsole implements IImpressora{
  function Imprime($string){
    echo "Impressora de Console...", PHP_EOL, $string;
  }
}
class ImpressoraArquivo implements IImpressora{
  function Imprime($string){
    // Obtém o conteúdo do arquivo como string
    $conteudo = @file_get_contents( 'saida.txt' );
    if ( $conteudo === false ) { // Arquivo não existe
        $conteudo = '';
    }
    // Guarda o conteúdo no arquivo como string
    file_put_contents( 'saida.txt', $conteudo . $valor );
  }
}

  ?>