<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenação de Números</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body>
    <h2>Ordenação de Números</h2>
    <form method="post">
        <label for="a">Valor de A:</label>
        <input type="number" id="a" name="a" required>
        <br>
        <label for="b">Valor de B:</label>
        <input type="number" id="b" name="b" required>
        <br>
        <button type="submit">Ordenar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST["a"];
        $b = $_POST["b"];

        if ($a < $b) {
            echo "<p>$a $b</p>";
        } elseif ($a > $b) {
            echo "<p>$b $a</p>";
        } else {
            echo "<p>Números iguais: $a</p>";
        }
    }
    ?>
</body>
</html>
