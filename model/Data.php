<?php

require_once 'Connection.php';
class Data
{
    public function calculator($num1, $num2, $operacao)
    {
        $resultado = 0;

        if ($operacao == "+") {
            $resultado = $num1 + $num2;
        } elseif ($operacao == "-") {
            $resultado = $num1 - $num2;
        } elseif ($operacao == "*") {
            $resultado = $num1 * $num2;
        } elseif ($operacao == "/") {
            $resultado = $num1 / $num2;
        }

        // Tenta salvar no banco de dados
        try {
            $this->saveToDatabase($num1, $num2, $operacao, $resultado);
        } catch (PDOException $e) {
            // Se houver um erro, você pode lidar com isso de alguma maneira (ex: log, redirecionar para uma página de erro)
            // Aqui, estamos apenas registrando o erro no console
            error_log("Erro ao salvar no banco de dados: " . $e->getMessage());
        }

        return $resultado;
    }

    private function saveToDatabase($num1, $num2, $operacao, $resultado)
    {
        $pdo = new Connection();
        $pdo = $pdo->Connect();
        $tablename = "Calculos";

        $data = date("Y-m-d H:i:s");

        $stmt = $pdo->prepare("INSERT INTO $tablename (numero1, numero2, operacao, resultado, data) VALUES (:num1, :num2, :operacao, :resultado, :data)");
        $stmt->bindParam(':num1', $num1);
        $stmt->bindParam(':num2', $num2);
        $stmt->bindParam(':operacao', $operacao);
        $stmt->bindParam(':resultado', $resultado);
        $stmt->bindParam(':data', $data);
        $stmt->execute();
    }
}

?>
