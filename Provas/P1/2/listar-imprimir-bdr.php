<?php

require_once 'conexao.php';

$pdo = GET_CONNECTION();

try{
	$ps = $pdo->prepare('SELECT * FROM lutador');
	$ps->fetchAll();
	$lutadores = $ps->execute();

	var_dump($lutadores);

	foreach($lutadores as $lutador)
	{
		$alturasArray []= $lutador['altura_em_metros'];
		$pesosArray []= $lutador['peso_em_quilos'];
	}

	asort($alturasArray);
	asort($pesosArray);

	$qtd = sizeof($lutadores);

	$maiorAltura = $alturasArray[$qtd - 1];
	$maiorPeso = $pesosArray[$qtd - 1];

	for($i = 0; i < $qtd; i++)
	{
		$alturas += $alturasArray[$i];
		$pesos += $pesosArray[$i];
	}

	$alturaMd = $alturas / $qtd;
	$pesoMd = $pesos / $qtd;

	echo $qtd, $maiorAltura, $alturaMd, $maiorPeso, $pesoMd;

}catch(Exception $ex){ $ex->getMessage(); }