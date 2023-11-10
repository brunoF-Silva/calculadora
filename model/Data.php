<?php

require_once "../model/Connection.php";

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

        $this->saveToDatabase($num1, $num2, $operacao, $resultado);

        return $resultado;
    }

    private function saveToDatabase($num1, $num2, $operacao, $resultado)
    {
        $pdo = new Connection();
        $pdo = $pdo->Connect();
        $tablename = "Calculos";

        $data = date("Y-m-d H:i:s");

        try {
            $stmt = $pdo->prepare("INSERT INTO $tablename (numero1, numero2, operacao, resultado, data) VALUES (:num1, :num2, :operacao, :resultado, :data)");
            $stmt->bindParam(':num1', $num1);
            $stmt->bindParam(':num2', $num2);
            $stmt->bindParam(':operacao', $operacao);
            $stmt->bindParam(':resultado', $resultado);
            $stmt->bindParam(':data', $data);
            $stmt->execute();

            echo "Dados inseridos com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao inserir dados: " . $e->getMessage();
        }
    }
}

?>
