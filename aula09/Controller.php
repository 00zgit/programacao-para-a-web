<?php

require_once 'RepositorioCategoriaDB.php';
require_once 'RepositorioMateriaPrimaDB.php';
require_once 'RepositorioUnidadeDB.php';
require_once 'conexao.php';

$repoCategoria = new RepositorioCategoriaDB(GET_CONNECTION());
$repoUnidade = new RepositorioUnidadeDB(GET_CONNECTION());
$repoMateriaPrima = new RepositorioMateriaPrimaDB(GET_CONNECTION());

if(isset($_POST['nome_categoria']))
{
	$repoCategoria->cadastrar($_POST['nome_categoria']);
}
else if(isset($_POST['nome_materia_prima']))
{
	$repoMateriaPrima->cadastrar($_POST['nome_materia_prima'],$_POST['quantidade'],$_POST['preco'],$_POST['categoria'],$_POST['unidade']);
}
else if(isset($_POST['nome_unidade']))
{
	$repoUnidade->cadastrar($_POST['nome_unidade'],$_POST['sigla']);
}

header('Location: main.php');

?>