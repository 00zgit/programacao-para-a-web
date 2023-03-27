<?php
$inputData = readline("Insira uma data dd/mm/aaaa: ");
$dataArray = explode('/', $inputData);

$meses = [ 1 => 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' ];
$mes = (int) $dataArray[1];

echo $dataArray[0] . " de " . $meses[$mes] . " de " . $dataArray[2];
?>