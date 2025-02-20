<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Регистрация</title>
</head>

<body class="bg-warning-subtle">
    <div class="container mt-5 ">
        <form method="POST" action="register.php" class="container bg-light-subtle col-6 rounded p-3 mt-3 position-absolute top-50 start-50 translate-middle shadow-lg">
            <div class="row mb-3">
                <h2 class="text-warning">Форма регистрации</h2>
            </div>
            <div class="form-floating mb-3">
                <input type="Login" name="login" class="form-control border border-warning focus-ring focus-ring-warning" id="floatingLogin" placeholder="Password">
                <label for="floatingLogin">Login</label>
            </div>
            <div class="form-floating mb-3">
                <input type="Password" name="password" class="form-control border border-warning focus-ring focus-ring-warning" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
                <input type="Email" name="email" class="form-control border border-warning focus-ring focus-ring-warning" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="d-grid mt-3 bg-warning-subtle rounded-3">
                <button type="submit" class="btn btn-outline-warning text-dark w-100 rounded p-3 ">Зарегистрироваться</button>
            </div>
        </form>
    </div>

</body>

</html>