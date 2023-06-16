<!DOCTYPE html>
<title>Aula08</title>
<html>

<body>
  <h3>Testando protocolo HTTP</h3>
  <form method="POST" action="inserir.php">
    <label for="nome">Nome</label>
    <input id="nome" type="text" placeholder="Insira um nome" name="nome" />
    <label for="telefone">Telefone</label>
    <input id="telefone" type="number" placeholder="Insira um telefone" name="telefone" />
    <input type="submit" value="Cadastrar" />
  </form>
  <br>
  <a href="contatos.php">Ir para LISTAGEM</a>
</body>

</html>