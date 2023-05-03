<?php

require_once 'conexao.php';
require_once 'ContaFunctions.php';
require_once 'RepositorioContaDB.php';

const CADASTRAR = 1;
const DEPOSITAR = 2;
const LISTAR = 3;
const SAIR = 0;


$pdo = GET_CONNECTION();
$repo = new RepositorioContaDB($pdo);
$functions = new ContaFunctions($repo);

do{
	echo PHP_EOL, '--------------------------------', PHP_EOL,
	'1) Cadastrar', PHP_EOL,
	'2) Depositar', PHP_EOL,
	'3) Listar', PHP_EOL,
	'0) Sair', PHP_EOL,
	'> ';

	$opc = readline();
	switch($opc){
		case CADASTRAR : $functions->CADASTRAR(); break;
		case LISTAR : $functions->LISTAR(); break;
		case DEPOSITAR : $functions->DEPOSITAR(); break;
		case SAIR : break;
	}

}while($opc != SAIR);

echo 'Fechando programa.';

?>