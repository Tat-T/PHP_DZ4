<?php
class User {
    public $login;
    public $pass;
    public $email;

    public function __construct($login, $pass, $email) {
        $this->login = htmlspecialchars($login);
        $this->pass = htmlspecialchars($pass);
        $this->email = htmlspecialchars($email);
    }

    public function show() {
        echo "<div class='container mt-5 p-3 border border-warning rounded'>";
        echo "<h3 class='text-warning'>Регистрация успешна!</h3>";
        echo "<p><strong>Логин:</strong> $this->login</p>";
        echo "<p><strong>Email:</strong> $this->email</p>";
        echo "</div>";
    }
}

class Database {
    private $connection;

    public function connect($host, $user, $pass, $dbname) {
        $this->connection = new mysqli($host, $user, $pass, $dbname);
        if ($this->connection->connect_error) {
            die("Ошибка подключения: " . $this->connection->connect_error);
        }
        return $this->connection;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $pass = $_POST['password'] ?? '';
    $email = $_POST['email'] ?? '';
    
    if (!empty($login) && !empty($pass) && !empty($email)) {
        $user = new User($login, $pass, $email);
        $user->show();
    } else {
        echo "<div class='container mt-5 p-3 border border-danger rounded text-danger'>";
        echo "<p>Ошибка: все поля должны быть заполнены!</p>";
        echo "</div>";
    }
}
?>
