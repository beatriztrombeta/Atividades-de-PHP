<?php

use Php\Projetop1\Models\DAO\ClienteDAO;
use Php\Projetop1\Models\DAO\Conexao;

if (isset($_GET['id'])) {
    $idCliente = $_GET['id'];

    $conexao = new Conexao();
    $clienteDAO = new ClienteDAO($conexao);

    $cliente = $clienteDAO->listarApenasUm($idCliente);

    if ($cliente) {
        $id = $cliente['id'];
        $nome = $cliente['nome'];
        $email = $cliente['email'];
    } else {
        echo "Cliente não encontrado.";
    }
} else {
    echo "ID do cliente não foi fornecido.";
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Excluir Cliente</title>
</head>

<body>
    <main class="container">
        <h3>Excluir Cliente</h3>
        <form action="/clientes/deletar" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="row">
                <div class="col-6">
                    <label for="nome" class="form-label">Nome:</label>
                    <input disabled type="text" name="nome" class="form-control" value="<?= $nome ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="email" class="form-label">Email:</label>
                    <input disabled type="text" name="email" class="form-control" value="<?= $email ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Você deseja realmente excluir esse registro?</p>
                    <button type="submit" class="btn btn-danger">
                        Excluir
                    </button>
                </div>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>