<?php

require_once 'conexao.php';

$id = htmlspecialchars( $_GET['id'] );
try{
  $pdo = GET_CONNECTION();
  $ps = $pdo->prepare("DELETE FROM contato WHERE id = ?");
  $ps->execute([$id]);
  echo <<<html
    <script>alert('Removido com sucesso'); location.href="contatos.php";</script>
  html;
}catch(PDOException $e)
{
  echo $e->getMessage();
}


?>