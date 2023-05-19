<!DOCTYPE html>
<html lang="pt/br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultas HTTP c/ PHP</title>
</head>

<body>
  <a href="form.php">Voltar para CADASTRO</a>

  <table>
    <thead>
      <tr>
        <th>id</th>
        <th>nome</th>
        <th>telefone</th>
        <th>DELETE</th>
        <th>UPDATE</th>
        <?php
        if(isset($_GET['id'])){
          echo <<<html
            echo <th>SAVE</th>
          html;
        }
        ?>
      </tr>
    </thead>
    <tbody>
    <?php
      require_once 'conexao.php';
      $pdo = GET_CONNECTION();

      if(isset($_GET['pesquisa'])){
        $pesquisa = htmlspecialchars($_GET['pesquisa']);
        $ps = $pdo->prepare('SELECT * FROM contato WHERE nome LIKE "%?%" OR telefone LIKE "%?%"', [PDO::FETCH_ASSOC]);
        $ps->execute([$pesquisa,$pesquisa]);
      }
      else{
        $ps = $pdo->prepare("SELECT * FROM contato", [PDO::FETCH_ASSOC]);
        $ps->execute();
      }

      foreach ($ps as $c) {
        if(isset($_GET['id'])){
          if(htmlspecialchars($_GET['id']) == $c['id']){
            echo <<<html
              <tr>
                <td><input type="text" name="id" value="$c[id]" disabled></td>
                <td><input type="text" name="nome" value="$c[nome]"></td>
                <td><input type="text" name="telefone" value="$c[telefone]"></td>
                <td><a href="remover.php?id=$c[id]"/>DEL</td>
                <td><a href="contatos.php?id=$c[id]"/>ALT</td>
                <td>
                  <form method="GET" action="alterar.php?id=$c[id]&nome=$c[nome]&telefone=$c[telefone]">
                    <input type="submit" value="Salvar">
                  </form>
                </td>
              </tr>
            html;  
          }
          else{
            echo <<<html
              <tr>
                <td>$c[id]</td>
                <td>$c[nome]</td>
                <td>$c[telefone]</td>
                <td><a href="remover.php?id=$c[id]"/>DEL</td>
                <td><a href="contatos.php?id=$c[id]"/>ALT</td>
              </tr>
            html;
          }
        }
        else{
          echo <<<html
            <tr>
              <td>$c[id]</td>
              <td>$c[nome]</td>
              <td>$c[telefone]</td>
              <td><a href="remover.php?id=$c[id]"/>DEL</td>
              <td><a href="contatos.php?id=$c[id]"/>ALT</td>
            </tr>
          html;
        }
      }
    ?>
    </tbody>
  </table>
</body>

</html>