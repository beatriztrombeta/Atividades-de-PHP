<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <title>Cálculo Fatorial</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body>
    <h2>Cálculo Fatorial</h2>
    <form method="post">
        <label for="numero">Digite um número:</label>
        <input type="number" id="numero" name="numero" required min="0">
        <button type="submit">Calcular Fatorial</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST["numero"];
        
        function calcularFatorial($n) {
            if ($n <= 1) {
                return 1;
            } else {
                return $n * calcularFatorial($n - 1);
            }
        }

        $fatorial = calcularFatorial($numero);
        echo "<p>O fatorial de $numero é: $fatorial</p>";
    }
    ?>
</body>
</html>
