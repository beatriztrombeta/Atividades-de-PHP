<?php

use Php\Projetop1\Models\DAO\EmprestimoDAO;
use Php\Projetop1\Models\DAO\Conexao;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $conexao = new Conexao();
    $emprestimoDAO = new EmprestimoDAO($conexao);

    $emprestimo = $emprestimoDAO->listarApenasUm($id);

    if ($emprestimo) {
        $id = $emprestimo['id'];
        $dataEmprestimo = $emprestimo['data_emprestimo'];
        $dataDevolucao = $emprestimo['data_devolucao'];
        $idLivro = $emprestimo['id_livro'];
        $idCliente = $emprestimo['id_cliente'];
    } else {
        echo "Empréstimo não encontrado.";
    }
} else {
    echo "ID do empréstimo não foi fornecido.";
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Empréstimos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <h3>Alterar Empréstimos</h3>
        <form action="/emprestimos/atualizar" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="row">
                <div class="col-6">
                    <label for="data_emprestimo" class="form-label">Data de Empréstimo:</label>
                    <input type="date" name="data_emprestimo" class="form-control" value="<?= $dataEmprestimo ?>">
                </div>
                <div class="col-6">
                    <label for="data_devolucao" class="form-label">Data de Devolução:</label>
                    <input type="date" name="data_devolucao" class="form-control" value="<?= $dataDevolucao ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="id_livro" class="form-label">ID do Livro:</label>
                    <input type="text" name="id_livro" class="form-control" value="<?= $idLivro ?>">
                </div>
                <div class="col-6">
                    <label for="id_cliente" class="form-label">ID do Cliente:</label>
                    <input type="text" name="id_cliente" class="form-control" value="<?= $idCliente ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
