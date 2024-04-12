<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Número</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body>
    <h2>Verificar Número</h2>
    <form method="post">
        <label for="numero">Digite um número:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit">Verificar</button>
    </form>

    <?php
    function verificarNumero($numero) {
        if ($numero > 0) {
            return "Valor Positivo";
        } elseif ($numero < 0) {
            return "Valor Negativo";
        } else {
            return "Igual a Zero";
        }
    }

    // Verificar se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obter o número digitado pelo usuário
        $numero = $_POST["numero"];

        // Verificar e imprimir o resultado
        echo "<p>" . verificarNumero($numero) . "</p>";
    }
    ?>

</body>
</html>
