<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <h2>Calculadora</h2>

    <form action="process.php" method="post">
        <label for="num1">Número 1:</label>
        <input type="number" name="num1" id="num1" required>
        
        <label for="operacao">Operação:</label>
        <select name="operacao" id="operacao" required>
            <option value="+">Soma</option>
            <option value="-">Subtração</option>
            <option value="*">Multiplicação</option>
            <option value="/">Divisão</option>
        </select>
        
        <label for="num2">Número b:</label>
        <input type="number" name="num2" id="num2" required>

        <button type="submit">Calcular</button>

        <!-- Campo de saída para mostrar o resultado -->
        <label for="resultado">Resultado:</label>
        <output id="resultado" name="resultado"></output>
    </form>

    <?php
    // Processamento do resultado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once '../model/Data.php'; // Use require_once para garantir que o arquivo seja incluído apenas uma vez

        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operacao = $_POST["operacao"];

        $data = new Data();
        $resultado = $data->calculator($num1, $num2, $operacao);

        // Exibe o resultado no campo de saída
        echo "<script>document.getElementById('resultado').value = $resultado;</script>";
    }
    ?>
</body>
</html>
