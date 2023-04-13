<?php
$inputData = readline("Insira uma data dd/mm/aaaa: ");
$dataArray = explode('/', $inputData);

$meses = [ 1 => 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' ];
$mes = (int) $dataArray[1];

echo $dataArray[0] . " de " . $meses[$mes] . " de " . $dataArray[2];


////////////////////


$contato = new stdClass(); //obj dinamico

$contato->nome = 'Laura';
$contato->telefone = '99999888';

$arrayDeLaura = (array) $contato;
echo $arrayDeLaura['nome'], ' ', $arrayDeLaura['telefone'];

// convertendo de volta para obj
$metamorfoseAmbulante = (object) $arrayDeLaura;
echo PHP_EOL, $metamorfoseAmbulante->nome, ' ', $metamorfoseAmbulante->telefone;

?>