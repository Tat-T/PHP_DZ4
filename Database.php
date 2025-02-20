<?php
class Database {
    private $connection;

    public function connect($host, $user, $password, $dbname) {
        try {
            $dsn = "sqlsrv:Server=$host;Database=$dbname";
            $this->connection = new PDO($dsn, $user, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Ошибка подключения: " . $e->getMessage());
        }
        return $this->connection;
    }
}
?>