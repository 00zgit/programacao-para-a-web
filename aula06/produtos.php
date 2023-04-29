<?php

namespace acme;

require_once 'mediator.php';

$pdo = conexao();

function listarTodos()
{
	$ps = $pdo->query("SELECT * FROM produto");
	$produtos = $ps->fetchAll();

	return $produtos;
}

function listarPorPalavraChave(string $palavra)
{

}

function printProdutos(array $a)
{
	foreach($a as $p)
	{
		echo ;
	}
}

?>