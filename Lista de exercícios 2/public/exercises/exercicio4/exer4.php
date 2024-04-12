<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body>
    <h2>Tabuada</h2>
    <form method="post">
        <label for="numero">Digite um número:</label>
        <input type="number" id="numero" name="numero" required><br>
        <button type="submit">Gerar Tabuada</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST["numero"];

        echo "<h3>Tabuada do $numero:</h3>";

        for ($i = 0; $i <= 10; $i++) {
            $resultado = $numero * $i;
            echo "<p>$numero X $i = $resultado</p>";
        }
    }
    ?>
</body>

</html>