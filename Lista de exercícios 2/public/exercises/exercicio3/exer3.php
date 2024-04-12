<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Soma</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body>
    <h2>Calculadora de Soma</h2>
    <form method="post">
        <label for="valor1">Valor 1:</label>
        <input type="number" id="valor1" name="valor1" required><br>
        <label for="valor2">Valor 2:</label>
        <input type="number" id="valor2" name="valor2" required><br>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valor1 = $_POST["valor1"];
        $valor2 = $_POST["valor2"];

        $soma = $valor1 + $valor2;

        if ($valor1 == $valor2) {
            $resultado = $soma * 3;
            echo "<p>O resultado é o triplo da soma dos valores: $resultado</p>";
        } else {
            echo "<p>O resultado da soma dos valores é: $soma</p>";
        }
    }
    ?>

</body>
</html>
