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
    $conteudoDoArquivo = @file_get_contents("impressora.txt");

    //...
  }
}

  ?>