<?php

function calculate($num1, $num2, $operator)
{
  switch ($operator) {
    case '+':
      return $num1 + $num2;
    case '-':
      return $num1 - $num2;
    case '*':
      return $num1 * $num2;
    case '/':
      return $num1 / $num2;
    default:
      return 'Operação inválida';
  }
}

// Verifica se os parâmetros necessários estão definidos
if (isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['operator'])) {
  $num1 = floatval($_GET['num1']);
  $num2 = floatval($_GET['num2']);
  $operator = $_GET['operator'];

  // Chama a função calculate e imprime o resultado
  echo calculate($num1, $num2, $operator);
} else {
  echo 'Parâmetros inválidos';
}
?>