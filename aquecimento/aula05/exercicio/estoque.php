<?php

namespace Acme;
require_once 'produto.php';

const SAIR = 0;
const ADD = 1;
const RM = 2;
const SAVE = 3;
const LOAD = 4;

$produtos = [];
$produto1 = new Produto(0,'codxx','Produto para aprender boas práticas em PHP','Boa sorte',1.00);
$produto2 = new Produto(200,'codxy','Biblioteca das doideiras em PHP','HeHe',2.99);
$produto3 = new Produto(5,'codxpto','Aprendendo PHP na prática','Diversão infinita',50.00);
$produtos []= $produto1;
$produtos []= $produto2;
$produtos []= $produto3;

do{
	// clean screen

	echo
		ADD,	' ',	'Adicionar ao estoque',		PHP_EOL,
		RM,		' ',	'Remover do estoque',		PHP_EOL,
		SAIR,	' ',	'exit',						PHP_EOL,
		'>> ';
	$input = readline();

	// clean screen

	switch($input){
		case ADD :{
			$id = buscar($produtos);
			if(imprimeProdutoExistente($produtos[$id]) === true){
				addEstoque($produtos[$id]);
			}
		}break;
		case RM :{
			$id = buscar($produtos);
			if(imprimeProdutoExistente($produtos[$id]) === true){
				rmEstoque($produtos[$id]);
			}
		}break;
		case SAVE :{

		}break;
		case LOAD :{
			
		}break;

		CASE SAIR : break;
		default : echo PHP_EOL, 'Escolha inválida', PHP_EOL;
	}

}while($input != SAIR);



function addEstoque($prod){
	echo "Adicionar ao estoque de $prod->codigo: ";
	$qtd = readline();
  	$prod->estoque += $qtd;
}
function rmEstoque($prod){
	echo "Remover do estoque de $prod->codigo: ";
	$qtd = readline();
  	if(($prod->estoque -= $qtd) < 0){
  		$prod->estoque = 0;
  	}
}


function imprimeProdutoExistente($prod){
	if($prod === false){
		echo PHP_EOL, 'Código de produto inexistente.', PHP_EOL;
		return false;
	}
	else{
		echo PHP_EOL,
			"PRODUTO SELECIONADO: $prod->codigo | $prod->nome | $prod->descricao | R$$prod->preco x$prod->estoque",
			PHP_EOL;

		return true;
	}
}

function buscar(&$produtos){
	echo 'Insira o código do produto: ';
	$cod = readline();

	foreach($produtos as $id){
		if($id === $cod){
			return $id;
		}
	}
	return false;
}

?>