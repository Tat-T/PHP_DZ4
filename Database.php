<?php
$host = "DESKTOP-NKNKVEQ\\SQLEXPRESS";
$user = "";  // Windows-аутентификация
$password = "";
$dbname = "DZ_4";

class Database
{
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

    // Создание таблицы пользователей
    function createUsersTable($pdo)
    {
        $sql = "CREATE TABLE Users (
            id INT IDENTITY(1,1) PRIMARY KEY,
            login NVARCHAR(50) UNIQUE NOT NULL,
            password NVARCHAR(255) NOT NULL,
            email NVARCHAR(100) UNIQUE NOT NULL,
            created_at DATETIME DEFAULT GETDATE()
        )";
        try {
            $pdo->exec($sql);
            echo "Таблица пользователей успешно создана.";
        } catch (PDOException $e) {
            echo "Ошибка создания таблицы: " . $e->getMessage();
        }
    }
}
