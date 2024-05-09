<?php

use Php\Projetop1\Models\DAO\LivroDAO;
use Php\Projetop1\Models\DAO\Conexao;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $conexao = new Conexao();
    $livroDAO = new LivroDAO($conexao);

    $livro = $livroDAO->listarApenasUm($id);

    if ($livro) {
        $id = $livro['id'];
        $titulo = $livro['titulo'];
        $autor = $livro['autor'];
        $idGenero = $livro['id_genero'];
    } else {
        echo "Livro não encontrado.";
    }
} else {
    echo "ID do livro não foi fornecido.";
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Excluir Livro</title>
</head>

<body>
    <main class="container">
        <h3>Excluir Livro</h3>
        <form action="/livros/deletar" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="row">
                <div class="col-6">
                    <label for="titulo" class="form-label">Título:</label>
                    <input disabled type="text" name="titulo" class="form-control" value="<?= $titulo ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="autor" class="form-label">Autor:</label>
                    <input disabled type="text" name="autor" class="form-control" value="<?= $autor ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="id_genero" class="form-label">ID do Gênero:</label>
                    <input disabled type="text" name="id_genero" class="form-control" value="<?= $idGenero ?>">
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