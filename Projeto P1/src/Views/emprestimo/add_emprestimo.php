<?php

use Php\Projetop1\Models\DAO\EmprestimoDAO;
use Php\Projetop1\Models\DAO\Conexao;

$conexao = new Conexao();
$emprestimoDAO = new EmprestimoDAO($conexao);

?>

<body>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Empréstimos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>

  <body class="container">
    <h3>Inserir Cliente</h3>
    <form action="/emprestimos/inserir" method="POST">
      <div class="row">
        <div class="col-7">
          <label for="data_emprestimo" class="form-label">Informe a data de empréstimo:</label>
          <input type="date" id="data_emprestimo" name="data_emprestimo" class="form-control" required />
        </div>
        <div class="col-5">
          <label for="data_devolucao" class="form-label">Informe a data de devolução:</label>
          <input type="date" id="data_devolucao" name="data_devolucao" class="form-control" required />
        </div>
        <div class="col-5">
          <label for="id_livro" class="form-label">Informe o ID do livro:</label>
          <input type="number" id="id_livro" name="id_livro" class="form-control" required />
        </div>
        <div class="col-5">
          <label for="id_cliente" class="form-label">Informe o ID do cliente:</label>
          <input type="number" id="id_cliente" name="id_cliente" class="form-control" required />
        </div>
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
          <th>Data do empréstimo</th>
          <th>Data de devolução</th>
          <th>ID do livro</th>
          <th>ID do cliente</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $emprestimos = $emprestimoDAO->listarTodos();
        if (!empty($emprestimos)) {
          foreach ($emprestimos as $emprestimo) {
            echo "<tr>
                    <td>{$emprestimo['id']}</td>
                      <td>{$emprestimo['data_emprestimo']}</td>
                      <td>{$emprestimo['data_devolucao']}</td>
                      <td>{$emprestimo['id_livro']}</td>
                      <td>{$emprestimo['id_cliente']}</td>
                      <td>
                        <a href='/emprestimos/alterar?id={$emprestimo['id']}' class='btn btn-warning'>Alterar</a>
                      </td>
                      <td>
                        <a href='/emprestimos/excluir?id={$emprestimo['id']}' class='btn btn-danger'>Excluir</a>
                      </td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='7'>Tabela vazia!</td></tr>";
        }
        ?>
      </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>

  </html>