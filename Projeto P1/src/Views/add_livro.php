<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="container">
    <h3>Hello, world!</h3>

    <?php
    if (isset($_GET['inserir'])) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Registro inserido com sucesso!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <a href="inserir" class="btn btn-info">Inserir novo Livro</a>
    <table class="table table-info table-striped table-hover">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once __DIR__ . '/../Controllers/LivrosController.php';
            $livrosController = new Php\Projetop1\Controllers\LivrosController();

            $dados = $livrosController->listarTodos([]);
            echo $dados;

            if (is_array($dados) && !empty($dados)) {
                foreach ($dados as $livro) {
                    echo "<tr>
                <td>{$livro['titulo']}</td>
                <td>{$livro['autor']}</td>
            </tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Tabela vazia!</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>