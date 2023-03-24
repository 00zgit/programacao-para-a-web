<?php

echo "Programa de impressão de número de telefone formatado\n";
$telefone = readline("Telefone: ");
$telefone = trim($telefone); // removendo caracteres em branco do início e do final da string
echo(formataNumero($telefone));

function formataNumero($telefone){
  // verificando se é um valor numérico puro
  if(!is_numeric($telefone)){
    return $telefone;
  }
  
  $count = mb_strlen($telefone);
  if($count === 8 ){ //12345678
    return mb_substr($telefone, 0 , 4) . ' ' . mb_substr($telefone, 4 , 4);
  }
  // outras validações com mb_substr... mesma lógica
}
?>