<?php

require_once 'perecivel.php';

$array = explode(PHP_EOL, file_get_contents('C:\Users\rodri\Documents\R\prog\github\programacao-para-a-web\Provas\P1\pereciveis.csv'));
//var_dump($array); é um array de strings com ponto e virgula

$pereciveis = [];

for($i = 1; $i < sizeof($array); $i++)
{
	$dados = explode(';', $array[$i]);
	//var_dump($dados); // é um array de duas casas, com o valor a esquerda e a direita do ponto e virgula
	array_push($pereciveis, new Perecivel($dados[0],$dados[1]));
}

//var_dump($pereciveis); // é um array de objetos Perecivel com propriedades descricao e validade

$dataAtual = "05/05/2023";
$a = explode("/",$dataAtual);
$diaV = $a[0];
$mesV = $a[1];
$anoV = $a[2];

$vencidos = [];

foreach($pereciveis as $obj)
{
	$a = explode("/",$obj->validade);
	$diaP = $a[0];
	$mesP = $a[1];
	$anoP = $a[2];

	$dias;

	if($anoV == $anoP)
	{
		if($mesV == $mesP)
		{
			if($diaP > $diaV)
			{
				$dias = (string) $diaP - $diaV;
			}
		}
		// outras validações...
	}

	$vencidos []= 'Produto "' . $obj->descricao . '" fora de validade há ' .  $dias . ' dias.' . PHP_EOL;
}

foreach($vencidos as $v)
{
	echo $v, PHP_EOL;
}