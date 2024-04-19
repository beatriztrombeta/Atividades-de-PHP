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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
    <table class="table table-info table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
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