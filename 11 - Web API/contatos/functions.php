<?php

require_once 'file.php';


function printContatos()
{
	$contatos = load();
	$acceptHeader = getallheaders()['Accept'];

	if($acceptHeader == 'text/html')
	{
		header('Content-Type: text/html');
		echo '<table><tr><th>Nome</th><th>Telefone</th></tr>';
		echo '<tbody>';
		foreach($contatos as $c)
			echo '<tr><td>' . $c->nome . '</td><td>' . $c->telefone . '</td>';
		echo '</tbody></table>';
	}
	else
	{
		header('Content-Type: application/json');
		echo json_encode($contatos, JSON_PRETTY_PRINT);
	}
}
function printContato($id)
{
	$contatos = load();
	$contato = null;
	
	foreach($contatos as $c)
	{
		if($c->id == $id){
		  $contato = $c;
		  break;
		}
	}
	if($contato){
		header('Content-Type: application/json');
		echo json_encode($contato, JSON_PRETTY_PRINT);
	}
	else{
		http_response_code(404);
	}
}


function delete($id)
{
	$contatos = load();
	$encontrado = false;
	
	foreach($contatos as $indice => $c)
	{
		if($c->id == $id)
		{
			unset($contatos[$indice]);
			$encontrado = true;
		  break;
		}
	}
	if($encontrado){
		save($contatos);
		http_response_code( 200 );
	}
	else{
		http_response_code( 404 );
	}
}

function cadastrar()
{
	$contatos = load();
	$data = getDataByType();
	$id = newID();
	$data['id'] = $id;
	$contatos []= $data;
	save($contatos);
	http_response_code( 204 );
}

function getDataByType()
{
	$tipoConteudo = getallheaders()['Content-Type'];
  $dadosContato = [];

  if($tipoConteudo == 'application/json')
  {
  	$str = file_get_contents('php://input');
  	$dadosContato = (array) json_decode( $str );
  }
  else if($tipoConteudo == 'application/x-www-form-urlencoded')
  {
  	$dadosContato = $_POST;
  }

  return $dadosContato;
}