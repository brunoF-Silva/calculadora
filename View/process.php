<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../model/Data.php';

    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operacao = $_POST["operacao"];

    $data = new Data();
    $resultado = $data->calculator($num1, $num2, $operacao);

    // Envie o resultado de volta para a página HTML como resposta AJAX
    echo $resultado;
}

?>
