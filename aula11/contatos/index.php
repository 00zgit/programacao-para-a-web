<?php

require_once 'functions.php';

$metodo = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];


if($metodo == 'GET' && preg_match("/^\/contatos\/?$/i", $url))
{
  printContatos();
}
else if ($metodo == 'GET' && preg_match("/^\/contatos\/([0-9]+)\/?$/i", $url, $casamentos))
{
  [,$id] = $casamentos;
  printContatoById($id);
}
else if($metodo == 'DELETE' && preg_match("/^\/contatos\/([0-9]+)\/?$/i", $url, $casamentos))
{
  [,$id] = $casamentos;
  delete($id);
  printContatos();
}
else
{
  echo http_response_code( 500 );
}

?>