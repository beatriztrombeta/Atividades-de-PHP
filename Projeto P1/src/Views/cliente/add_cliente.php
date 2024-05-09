<?php

use Php\Projetop1\Models\DAO\ClienteDAO;
use Php\Projetop1\Models\DAO\Conexao;

$conexao = new Conexao();
$clienteDAO = new ClienteDAO($conexao);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
</head>

<body class="container">
    <h3>Inserir Cliente</h3>
    <form action="/clientes/inserir" method="POST">
        <div class="row">
            <div class="col-7">
                <label for="nome" class="form-label">Informe o nome do cliente:</label>
                <input type="text" id="nome" name="nome" class="form-control" required />
            </div>
            <div class="col-5">
                <label for="email" class="form-label">Informe o email:</label>
                <input type="text" id="email" name="email" class="form-control" required />
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
                <th>Nome</th>
                <th>Email</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $clientes = $clienteDAO->listarTodos();
            if (!empty($clientes)) {
                foreach ($clientes as $cliente) {
                    echo "<tr>
                    <td>{$cliente['id']}</td>
                    <td>{$cliente['nome']}</td>
                    <td>{$cliente['email']}</td>
                    <td>
                        <a href='/clientes/alterar?id={$cliente['id']}' class='btn btn-warning'>Alterar</a>
                    </td>
                    <td>
                        <a href='/clientes/excluir?id={$cliente['id']}' class='btn btn-danger'>Excluir</a>
                    </td>
                </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tabela vazia!</td></tr>";
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