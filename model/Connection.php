<?php

class Connection
{
    private $host = 'localhost';
    private $dbname = 'calculadora';
    private $user = 'root';
    private $password = NULL;

    public function Connect()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }
}

?>