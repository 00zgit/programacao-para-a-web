<?php

namespace acme;

require_once 'mediator.php';

$pdo = conexao();

public function listarTodos()
{
	$ps = $pdo->query("SELECT * FROM produto");
	$produtos = $ps->fetchAll();

	return $produtos;
}

public function listarPorPalavraChave(string $palavra)
{

}

public function printProdutos(array $a)
{
	foreach($a as $p)
	{
		echo ;
	}
}

?>