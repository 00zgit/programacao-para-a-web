<?php

require_once '../RepositorioMateriaPrimaDB.php';
require_once './db/conexao.php';

$repoCategoria = new RepositorioMateriaPrimaDB(GET_CONNECTION());
$repoCategoria->delete($_GET['id']);

header('Location: index.php');

?>