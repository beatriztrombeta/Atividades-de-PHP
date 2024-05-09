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

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <h3>Alterar Livro</h3>
        <form action="/livros/atualizar" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="row">
                <div class="col-6">
                    <label for="titulo" class="form-label">Título:</label>
                    <input type="text" name="titulo" class="form-control" value="<?= $titulo ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="autor" class="form-label">Autor:</label>
                    <input type="text" name="autor" class="form-control" value="<?= $autor ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="id_genero" class="form-label">ID do Gênero:</label>
                    <input type="text" name="id_genero" class="form-control" value="<?= $idGenero ?>">
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
