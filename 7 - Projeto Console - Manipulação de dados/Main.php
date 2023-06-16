<?php

require_once 'conexao.php';
require_once 'ContaFunctions.php';
require_once 'RepositorioContaDB.php';

const CADASTRAR		= 1;
const DEPOSITAR 	= 2;
const LISTAR 		= 3;
const TRANSFERIR 	= 4;
const SAIR 			= 0;


$pdo 		= GET_CONNECTION();
$repo 		= new RepositorioContaDB($pdo);
$functions 	= new ContaFunctions($repo);

do{
	echo PHP_EOL, '--------------------------------', PHP_EOL,
	CADASTRAR,	') Cadastrar',	PHP_EOL,
	DEPOSITAR,	') Depositar',	PHP_EOL,
	LISTAR,		') Listar', 	PHP_EOL,
	TRANSFERIR,	') Transferir', PHP_EOL,
	SAIR,		') Sair', 		PHP_EOL,
	'> ';

	$opc = readline();

	switch($opc){
		case CADASTRAR 	: $functions->CADASTRAR(); 	break;
		case LISTAR 	: $functions->LISTAR(); 	break;
		case DEPOSITAR 	: $functions->DEPOSITAR(); 	break;
		case TRANSFERIR : $functions->TRANSFERIR();	break;
		case SAIR 		: 							break;
	}

}while($opc != SAIR);

echo 'Fechando programa.';

?>