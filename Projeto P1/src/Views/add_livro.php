<?php

use Php\Projetop1\Models\DAO\LivroDAO;
use Php\Projetop1\Models\DAO\Conexao;

$conexao = new Conexao();
$livroDAO = new LivroDAO($conexao);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="container">
    <h3>Inserir Livro</h3>
    <form action="/livros/inserir" method="POST">
        <div class="row">
            <div class="col-7">
                <label for="titulo" class="form-label">Informe o título:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" required />
            </div>
            <div class="col-5">
                <label for="autor" class="form-label">Informe o autor:</label>
                <input type="text" id="autor" name="autor" class="form-control" required />
            </div>
            <div class="col-5">
                <label for="id_genero" class="form-label">Informe o id do gênero:</label>
                <input type="number" id="id_genero" name="id_genero" class="form-control" required />
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
                <th>Título</th>
                <th>Autor</th>
                <th>ID do gênero</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $livros = $livroDAO->listarTodos();
            if (!empty($livros)) {
                foreach ($livros as $livro) {
                    echo "<tr>
                            <td>{$livro['id']}</td>
                            <td>{$livro['titulo']}</td>
                            <td>{$livro['autor']}</td>
                            <td>{$livro['id_genero']}</td>
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