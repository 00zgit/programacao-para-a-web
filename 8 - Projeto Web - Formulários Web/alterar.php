<?php
require_once 'conexao.php';
$pdo = GET_CONNECTION();

$id = htmlspecialchars( $_POST['id'] );
$nome = htmlspecialchars( $_POST['nome'] );
$telefone = htmlspecialchars($_POST['telefone'] );
try{
  $ps = $pdo->prepare('UPDATE contato SET nome = ?, telefone = ? WHERE id = ?');
  $ps->execute([$nome,$telefone,$id]);
  header('Location: contatos.php');
}catch(PDOException $e)
{
  echo $e->getMessage();
}

?>