
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Idade</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
    <title>Calculadora de Tintas</title>
</head>
<body>

<h2>Calculadora de Idade</h2>

<form method="post">
    <label for="anoNascimento">Ano de nascimento:</label><br>
    <input type="number" id="anoNascimento" name="anoNascimento" required><br><br>
    <input type="submit" value="Calcular">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $anoNascimento = $_POST["anoNascimento"];
    $anoAtual = date("Y");

    $idade = $anoAtual - $anoNascimento;
    $diasVividos = $idade * 365;
    $idade2025 = 2025 - $anoNascimento;

    echo "<h3>Resultados:</h3>";
    echo "Idade atual: $idade anos<br>";
    echo "Dias vividos até o momento: $diasVividos dias<br>";
    echo "Idade em 2025: $idade2025 anos";
}
?>

</body>
</html>
