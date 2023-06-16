<?php
// é como se fosse um dictionary, chave-valor
$meses = [ 5 => 'Maio', 'Junho']; // índice automático
array_push( $meses, 'Julho');
print_r( $meses );

print_r( count( $meses ) . "\n\n" ); // o array tem tamanho 3!
// e como é chave valor, a chave é válida de qualquer tipo. obs: QUALQUER,
//bem como em qualquer ordem...


$contato = [ "Nome" => 'Rodrigo', "Telefone" => 2299999999 ]; // são chave-valor
echo $contato["Nome"]; //Rodrigo
?>