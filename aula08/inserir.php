<?php
require_once 'conexao.php';

$nome = htmlspecialchars( $_POST['nome'] );
$telefone = htmlspecialchars($_POST['telefone'] );
try{
  $pdo = GET_CONNECTION();
  $sql = 'INSERT INTO contato (nome, telefone) VALUES (?, ?)';
  $ps = $pdo->prepare($sql);
  $ps->execute([$nome,$telefone]);
  header('Location: contatos.php');
}catch(PDOException $e)
{
  echo $e->getMessage();
}

?>