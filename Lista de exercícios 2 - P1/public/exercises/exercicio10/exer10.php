<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body>

<h2>Calculadora de IMC</h2>

<form method="post">
    <label for="peso">Peso (kg):</label><br>
    <input type="number" id="peso" name="peso" required><br><br>
    <label for="altura">Altura (m):</label><br>
    <input type="number" id="altura" name="altura" step="0.01" required><br><br>
    <input type="submit" value="Calcular">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];

    $imc = $peso / ($altura * $altura);

    if ($imc < 18.5) {
        $status = "abaixo do peso";
    } elseif ($imc >= 18.5 && $imc < 24.9) {
        $status = "com peso normal";
    } elseif ($imc >= 25 && $imc < 29.9) {
        $status = "com sobrepeso";
    } else {
        $status = "com obesidade";
    }

    echo "<h3>Resultado:</h3>";
    echo "Seu IMC é: " . number_format($imc, 2) . "<br>";
    echo "Você está $status.";
}
?>

<p>Para saber mais sobre o Índice de Massa Corporal (IMC), consulte este <a href="https://www.bbc.com/portuguese/geral-46311722">link</a>.</p>

</body>
</html>
