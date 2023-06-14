<?php

function load()
{
  $content = file_get_contents('contatos.json');
  $obj = json_decode($content);
  return $obj->contatos;
}

function save($contatos)
{
	$obj = new stdClass();
	$obj->contatos = $contatos;
	$str = json_encode($obj);
	file_put_contents('contatos.json', $str);
}

function newID()
{
	$contatos = load();
	$maior = 0;

	foreach($contatos as $c)
		if($c->id > $maior)
			$maior = $c->id;

	return $maior + 1;
}