<?php

$metodo = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];

function load()
{
  $content = file_get_contents('api.json');
  $obj = json_decode($content);
  header('Content-Type: application/json');
  return $obj->contatos;
}

function save()
{

}


if($metodo == 'GET' && preg_match("/^\/contatos\/?$/i", $url))
{
  $contatos = load();
  echo json_encode($contatos, JSON_PRETTY_PRINT);
}
else if ($metodo == 'GET' && preg_match("/^\/contatos\/([0-9]+)\/?$/i", $url, $casamentos))
{
  [,$id] = $casamentos;
  $achou = false;
  $contatos = load();
  foreach($contatos as $c)
  {
    if($c->id == $id){
      echo json_encode( $c, JSON_PRETTY_PRINT );
      $achou = true;
      break;
    }
  }
  if(!$achou){
    http_response_code( 404 );
  }
}

?>