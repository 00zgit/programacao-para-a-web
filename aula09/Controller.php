<?php

require_once 'RepositorioCategoriaDB.php';
require_once 'RepositorioMateriaPrimaDB.php';
require_once 'RepositorioUnidadeDB.php';
require_once 'conexao.php';


if(isset($_POST['nome_categoria']))
{
	$repoCategoria = new RepositorioCategoriaDB(GET_CONNECTION());
	$repoCategoria->cadastrar($_POST['nome_categoria']);
}
else if(isset($_POST['nome_materia_prima']))
{
	$repoMateriaPrima = new RepositorioMateriaPrimaDB(GET_CONNECTION());
	$repoMateriaPrima->cadastrar($_POST['nome_materia_prima'],$_POST['quantidade'],$_POST['preco'],$_POST['categoria'],$_POST['unidade']);
}
else if(isset($_POST['nome_unidade']))
{
	$repoUnidade = new RepositorioUnidadeDB(GET_CONNECTION());
	$repoUnidade->cadastrar($_POST['nome_unidade'],$_POST['sigla']);
}

header('Location: main.php');

?>