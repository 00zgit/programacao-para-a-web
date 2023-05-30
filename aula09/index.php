<?php 
require_once 'RepositorioCategoriaDB.php';
require_once 'RepositorioUnidadeDB.php';
require_once 'RepositorioMateriaPrimaDB.php';
require_once 'conexao.php';

$repoC = new RepositorioCategoriaDB(GET_CONNECTION());
$repoU = new RepositorioUnidadeDB(GET_CONNECTION());
$repoMP = new RepositorioMateriaPrimaDB(GET_CONNECTION());

$categorias = [];
$categorias = $repoC->PegarTodasCategorias();
$unidades = [];
$unidades = $repoU->PegarTodasUnidades();
$materiasprimas = [];
$materiasprimas = $repoMP->PegarTodasMateriasPrimas();

?>
<!DOCTYPE html>
<html>
<head>
<title>Aula09</title>	
</head>
<body>
	<h2>CADASTRAR MATÉRIA-PRIMA</h2>
	<form method="POST" action="Controller.php">
		<select required name="categoria">
			<option selected disabled>Categoria</option>
			<?php

			foreach($categorias as $c)
			{
				echo <<<html
				<option value="$c[id]">$c[nome]</option>
				html;
			}

			?>
		</select>
		<input type="text" name="nome_materia_prima" placeholder="Nome" required>
		<input type="number" name="quantidade" placeholder="Quantidade" required>
		<select required name="unidade">
			<option selected disabled>Unidade</option>
			<?php

			foreach($unidades as $u)
			{
				echo <<<html
				<option value="$u[id]">$u[descricao] - $u[sigla]</option>
				html;
			}

			?>
		</select>
		<input type="number" name="preco" placeholder="Preço" required>
		<input type="submit">
	</form>

	<br>

	<h2>CADASTRAR CATEGORIA</h2>
	<form method="POST" action="Controller.php">
		<input type="text" name="nome_categoria" placeholder="Nome" required>
		<input type="submit">
	</form>

	<br>

	<h2>CADASTRAR UNIDADE</h2>
	<form method="POST" action="Controller.php">
		<input type="text" name="nome_unidade" placeholder="Descrição (ex.: Kilograma, Metro, Grama, Litro)" required>
		<input type="text" name="sigla" placeholder="Sigla (ex.: Kg, m, g, L)" required>
		<input type="submit">
	</form>

	<br>
	<br>

	<hr>

	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Quantidade</th>
				<th>Unidade</th>
				<th>Preco</th>
				<th>Categoria</th>
				<th>DELETAR</th>
			</tr>
		</thead>
		<tbody>
			<?php

			foreach($materiasprimas as $mp)
			{
				echo <<<html
				<tr>
					<td>$mp[id]</td>
					<td>$mp[nome]</td>
					<td>$mp[quantidade]</td>
					<td>$mp[sigla]</td>
					<td>$mp[preco]</td>
					<td>$mp[categoria]</td>
					<td><a href="deletar.php?id=$mp[id]">DEL</a></td>
				</tr>
				html;
			}

			?>
		</tbody>
	</table>
</body>
</html>