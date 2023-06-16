<?php

require_once '../Repositories/db/conexao.php';

require_once '../Repositories/RepositorioCategoriaDB.php';
require_once '../Repositories/RepositorioMateriaPrimaDB.php';
require_once '../Repositories/RepositorioUnidadeDB.php';

require_once '../Models/Categoria.php';
require_once '../Models/MateriaPrima.php';
require_once '../Models/Unidade.php';


if(isset($_POST['nome_categoria']))
{
	$repo = new RepositorioCategoriaDB(GET_CONNECTION());
	$categoria = new Categoria(0,$_POST['nome_categoria'])
	$repo->cadastrar($categoria);
}
else if(isset($_POST['nome_materia_prima']))
{
	$repo = new RepositorioMateriaPrimaDB(GET_CONNECTION());
	$materiaPrima = new MateriaPrima(0,$_POST['nome_materia_prima'],$_POST['quantidade'],$_POST['preco'],$_POST['categoria'],$_POST['unidade']);
	$repo->cadastrar($materiaPrima);
}
else if(isset($_POST['nome_unidade']))
{
	$repo = new RepositorioUnidadeDB(GET_CONNECTION());
	$unidade = new Unidade(0,$_POST['nome_unidade'],$_POST['sigla']);
	$repo->cadastrar($unidade);
}

header('Location: index.php');

?>