<?php

use Php\Projetop1\Models\DAO\Conexao;
use Php\Projetop1\Models\DAO\GeneroDAO;

$conexao = new Conexao();
$generoDAO = new GeneroDAO($conexao);

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD Gêneros</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="container">
  <h3>Inserir Gênero</h3>
  <form action="/generos/inserir" method="POST">
    <div class="row">
      <div class="col-7">
        <label for="nome_genero" class="form-label">Informe o nome do gênero:</label>
        <input type="text" id="nome_genero" name="nome_genero" class="form-control" required />
      </div>
      <div class="col-5">
        <label for="descricao" class="form-label">Informe a descrição:</label>
        <input type="text" id="descricao" name="descricao" class="form-control" required />
      </div>
      <br>
      <div class="row">
        <div class="col">
          <button class="btn btn-primary" type="submit">Salvar Dados</button>
        </div>
      </div>
  </form>
  <br>
  <table class="table table-info table-striped table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome do gênero</th>
        <th>Descrição</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $generos = $generoDAO->listarTodos();
      if (!empty($generos)) {
        foreach ($generos as $genero) {
          echo "<tr>
                  <td>{$genero['id']}</td>
                  <td>{$genero['nome_genero']}</td>
                  <td>{$genero['descricao']}</td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='3'>Tabela vazia!</td></tr>";
      }
      ?>
    </tbody>
  </table>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>