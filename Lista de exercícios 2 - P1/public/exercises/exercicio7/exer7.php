<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversão de Metros para Centímetros</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body>
    <h2>Conversão de Metros para Centímetros</h2>
    <form method="post">
        <label for="metros">Digite o valor em metros:</label>
        <input type="number" id="metros" name="metros" step="any" required>
        <button type="submit">Converter</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $metros = $_POST["metros"];
        $centimetros = 0;

        $decimais = strlen(substr(strrchr($metros, "."), 1));

        if ($decimais == 0) {
            $centimetros = $metros * 100;
        } elseif ($decimais == 1) {
            $centimetros = $metros * 1000;
        } elseif ($decimais == 2) {
            $centimetros = $metros * 10000;
        }

        echo "<p>$metros metro(s) equivale(m) a $centimetros centímetro(s).</p>";
    }
    ?>
</body>

</html>