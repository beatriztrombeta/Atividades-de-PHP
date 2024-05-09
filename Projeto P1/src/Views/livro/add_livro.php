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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
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
    <table class="table table-info table-striped table-hover" id="tabela">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>ID do gênero</th>
                <th></th>
                <th></th>
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
                            <td>
                                <a href='/livros/alterar?id={$livro['id']}' class='btn btn-warning'>Alterar</a>
                            </td>
                            <td>
                                <a href='/livros/excluir?id={$livro['id']}' class='btn btn-danger'>Excluir</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Tabela vazia!</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = new DataTable('#tabela', {
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/2.0.6/i18n/pt-BR.json',
                },
            });
        });
    </script>
</body>

</html>