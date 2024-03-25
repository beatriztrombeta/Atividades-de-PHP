<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encontrar Menor Valor</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body>
    <h2>Encontrar Menor Valor</h2>
    <form method="post">
        <?php
        for ($i = 1; $i <= 7; $i++) {
            echo "<label for='numero{$i}'>Número {$i}:</label><br>";
            echo "<input type='number' id='numero{$i}' name='numeros[]' required><br>";
        }
        ?>
        <button type="submit">Encontrar Menor Valor</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numeros = $_POST["numeros"];

        $menor_valor = $numeros[0];
        $posicao = 0;
        for ($i = 1; $i < count($numeros); $i++) {
            if ($numeros[$i] < $menor_valor) {
                $menor_valor = $numeros[$i];
                $posicao = $i;
            }
        }
        echo "<p>O menor valor é: $menor_valor</p>";
        echo "<p>O menor valor estava na posição/input: " . ($posicao + 1) . "</p>";
    }
    ?>

</body>
</html>
