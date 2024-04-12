<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
    <title>Calculadora de Tintas</title>
</head>

<body>

    <h2>Calculadora de Tintas</h2>

    <form method="post">
        <label for="area">Tamanho da área a ser pintada (m²):</label><br>
        <input type="number" id="area" name="area" required><br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        function calcularLatasDeTinta($area)
        {

            $coberturaPorLitro = 1 / 3;
            $litrosNecessarios = $area * $coberturaPorLitro;
            $latasNecessarias = ceil($litrosNecessarios / 18);

            return $latasNecessarias;
        }

        function calcularPrecoTotal($latasNecessarias)
        {
            $precoPorLata = 80.00;
            $precoTotal = $latasNecessarias * $precoPorLata;

            return $precoTotal;
        }

        $area = $_POST["area"];
        $latasNecessarias = calcularLatasDeTinta($area);
        $precoTotal = calcularPrecoTotal($latasNecessarias);
        
        echo "<h3>Resultados:</h3>";
        echo "Quantidade de latas de tinta necessárias: " . $latasNecessarias . "<br>";
        echo "Preço total: R$ " . number_format($precoTotal, 2, ',', '.');
    }
    ?>

</body>

</html>