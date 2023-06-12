<?php

function load()
{
  $content = file_get_contents('contatos.json');
  $obj = json_decode($content);
  header('Content-Type: application/json');
  return $obj->contatos;
}


function printContatos()
{

	$contatos = load();
	echo http_response_code( 200 ), PHP_EOL, json_encode($contatos, JSON_PRETTY_PRINT);
}

function printContatoById($id)
{
	header( 'Content-Type: application/json' );
	$contato;
	$achou = false;
	$contatos = load();
	foreach($contatos as $c)
	{
		if($c->id == $id){
		  $contato = json_encode( $c, JSON_PRETTY_PRINT );
		  $achou = true;
		  break;
		}
	}
	if(!$achou){
		echo http_response_code( 404 );
	}
	else{
		echo http_response_code( 200 ), PHP_EOL, $contato;
	}
}

function delete($id)
{
	$achou = false;
	$contatos = load();
	foreach($contatos as $indice => $c)
	{
		if($c->id == $id)
		{
			unset($contatos[$indice]);
			salvar($contatos);
			$achou = true;
		  break;
		}
	}
	if(!$achou){
		echo http_response_code( 404 );
	}
	else{
		echo http_response_code( 200 ), PHP_EOL;
	}
}

function salvar($contatos)
{
	$obj = new stdClass();
	$obj->contatos = $contatos;
	$str = json_encode($obj);
	file_put_contents('contatos.json', $str);
}

?>