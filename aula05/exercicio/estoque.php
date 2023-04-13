<?php

namespace Acme;
require_once 'produto.php';

const SAIR = 0;
const ADD = 1;
const RM = 2;
const SAVE = 3;
const LOAD = 4;

$produtos =
[
new Produto(0,'codxx','Produto para aprender boas práticas em PHP','Boa sorte',1.00),
new Produto(200,'codxy','Biblioteca das doideiras em PHP','HeHe',2.99),
new Produto(5,'codxpto','Aprendendo PHP na prática','Diversão infinita',50.00)
];


do{
	echo
		ADD,	' ',	'Adicionar ao estoque',		PHP_EOL,
		RM,		' ',	'Remover do estoque',		PHP_EOL,
		SAVE,	' ',	'Salvar produtos no csv',	PHP_EOL,
		LOAD,	' ',	'Carregar produtos do csv', PHP_EOL,
		SAIR,	' ',	'exit',						PHP_EOL,
		'>> ';
	$input = readline();

	try{
		switch($input){
			case ADD : addEstoque(); break;
			case RM : rmEstoque($produtos[$id]); break;
			case SAVE : # break;
			case LOAD : # break;
			CASE SAIR : break;
			default : echo PHP_EOL, 'Escolha inválida', PHP_EOL;
		}
	}catch(Exception $e){
		echo "Erro: {$e->getMessage()}";
	}
	
}while($input != SAIR);



function addEstoque($prod){
	$id = buscar($produtos);
	foreach($produtos as &$produto){
        if ($produto->getCodigo() == $codigo){
        	if(imprimeProdutoExistente($produto) != false){
        		echo "Adicionar ao estoque de $prod->codigo: ";
				$qtd = readline();
	            $produto->addEstoque( $valor );
        	}
            break;
        }
    }
}
function rmEstoque($prod){
	$id = buscar($produtos);
	foreach($produtos as &$produto){
        if ($produto->getCodigo() == $codigo){
        	if(imprimeProdutoExistente($produto) != false){
				echo "Remover do estoque de $prod->codigo: ";
				$qtd = readline();
            	$produto->rmEstoque( $valor );
        	}
            break;
        }
    }
}


function imprimeProdutoExistente($prod){
	if($prod === false){
		echo PHP_EOL, 'Produto inexistente.', PHP_EOL;
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

	foreach($produtos as $prod){
		if($prod->getCodigo == $cod){
			return $prod;
		}
	}
	return false;
}

?>