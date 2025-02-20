<?php
require_once "../Database.php";

class User
{
    public $id;
    public $login;
    public $password;
    public $email;
    private $db;

    public function __construct($login, $password, $email, $db, $id = null)
    {
        $this->id = $id;
        $this->login = htmlspecialchars($login);
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->email = htmlspecialchars($email);
        $this->db = $db;
    }

    public function show()
    {
        echo "<div class='container mt-5 p-3 border border-warning rounded'>";
        echo "<h3 class='text-warning'>Регистрация успешна!</h3>";
        echo "<p><strong>Логин:</strong> $this->login</p>";
        echo "<p><strong>Email:</strong> $this->email</p>";
        echo "</div>";
    }

    public function toDb() {
        // Проверка на существование email
        $check_sql = "SELECT COUNT(*) FROM Users WHERE email = :email";
        $check_stmt = $this->db->prepare($check_sql);
        $check_stmt->bindParam(':email', $this->email);
        $check_stmt->execute();
        
        if ($check_stmt->fetchColumn() > 0) {
            echo "<div class='container mt-5 p-3 border border-danger rounded text-danger'>";
            echo "<p>Ошибка: пользователь с таким email уже существует!</p>";
            echo "</div>";
            return false;
        }
        
        // Добавление нового пользователя
        $sql = "INSERT INTO Users (login, password, email) VALUES (:login, :password, :email)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':login', $this->login);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':email', $this->email);
        return $stmt->execute();
    }

}
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $_POST['email'] ?? '';
    }
    if (!empty($login) && !empty($password) && !empty($email)) {
        $db = (new Database())->connect($host, $user, $password, $dbname);
        $user = new User($login, $password, $email, $db);
        if ($user->toDb()) {
            $user->show();
        } else {
            echo "<div class='container mt-5 p-3 border border-danger rounded text-danger'>";
            echo "<p>Ошибка при сохранении в базу данных!</p>";
            echo "</div>";
        }
    } else {
        echo "<div class='container mt-5 p-3 border border-danger rounded text-danger'>";
        echo "<p>Ошибка: все поля должны быть заполнены!</p>";
        echo "</div>";
    }

