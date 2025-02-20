<?php
require_once "../Database.php";

class User {
    public $login;
    public $password;
    public $email;

    public function __construct($login, $password, $email) {
        $this->login = htmlspecialchars($login);
        $this->password = htmlspecialchars($password);
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $_POST['email'] ?? '';
    
    if (!empty($login) && !empty($password) && !empty($email)) {
        $user = new User($login, $password, $email);
        $user->show();
    } else {
        echo "<div class='container mt-5 p-3 border border-danger rounded text-danger'>";
        echo "<p>Ошибка: все поля должны быть заполнены!</p>";
        echo "</div>";
    }
}
?>
