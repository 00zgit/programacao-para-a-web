<?php

require_once 'RepositorioMateriaPrimaDB.php';
require_once 'conexao.php';

$repoCategoria = new RepositorioMateriaPrimaDB(GET_CONNECTION());
$repoCategoria->delete($_GET['id']);

header('Location: main.php');

?>