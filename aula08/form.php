<!DOCTYPE html>
<title>Aula08</title>
<html>

<body>
  <h3>Testando protocolo HTTP</h3>
  <form method="GET" action="inserir.php">
    <label for="nome">Nome</label>
    <input id="nome" type="text" placeholder="Insira um nome" name="nome" />
    <label for="telefone">Telefone</label>
    <input id="telefone" type="number" placeholder="Insira um telefone" name="telefone" />
    <input type="submit" value="Cadastrar" />
  </form>

  <br>

  <form method="GET" action="contatos.php">
    <label for="pesquisa">Pesquisar por</label>
    <input id="pesquisa" type="text" name="pesquisa" />

    <label for="ordem">Ordernar por</label>
    <select id="ordem">
      <option value="ordemNome">Nome</option>
      <option value="ordemTelefone">Telefone</option>
      <option value="1">(decrescente)</option>
    </select>

    <input type="submit" value="Listar" />
  </form>
  <br>
  <a href="contatos.php">Ir para LISTAGEM</a>
</body>

</html>