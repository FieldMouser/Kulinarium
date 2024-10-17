<?php

    session_start();

    $serverName = "localhost";
    $username = "u2852904_Login_E";
    $password = "Adm1n_L0g1n_3254";
    $dbName = "u2852904_default";

    //создание соединения
    $conn = new mysqli($serverName, $username, $password, $dbName);

    // Проверка соединения
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $errorMessage = ""; // Переменная для хранения сообщения об ошибке


    // Обработка формы логина
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $userLogin = $_POST['login'];
        $userPassword = $_POST['password'];

        if (strlen($userLogin) > 30 || strlen($userPassword) > 20) {
            $errorMessage = "Логин не должен превышать 30 символов, а пароль — 20.";
        }
        else {
            
            $sql = "SELECT * FROM users WHERE login = '$userLogin' AND password = '$userPassword'";
        
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Вход успешен
                $user = $result->fetch_assoc();
                setcookie("login", $user['login'], time() + 604800, "/");
                header("Location: index.php");
            } else {
                $errorMessage = "Неверные данные пользователя";
            }
        } 
    }
    $conn->close();

?>



<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <form action="login.php" method="post" class="content">
            <div class="recipe-card">
            <h1>Войти:</h1>
            <p>Логин:</p>
            <input type="text" name="login" id="" maxlength="30" required>
            <p>Пароль:</p>
            <input type="password" name="password" id="" maxlength="30" required><br><br>
            <?php if ($errorMessage): ?>
                <div style="color: red;"><?= htmlspecialchars($errorMessage) ?></div> <!-- Вывод ошибки -->
            <?php endif; ?>
            <button type="submit">Войти</button>
            </div>
            
        </form>

</body>
</html>