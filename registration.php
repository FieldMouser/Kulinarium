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
        $confirm_password = $_POST['confirm_password'];

        if (strlen($userLogin) > 30 || strlen($userPassword) > 20) {
            $errorMessage = "Логин не должен превышать 30 символов, а пароль — 20.";
        }
        else {

            if ($userPassword !== $confirm_password) {
                $errorMessage = "Пароли не совпадают!";
            }
            else {
                $sql = "INSERT INTO users (login, password) VALUES ('$userLogin', '$userPassword')";
                
                $result = $conn->query($sql);

                $sql = "SELECT * FROM users WHERE login = '$userLogin' AND password = '$userPassword'";

                $result = $conn->query($sql);
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $user = $result->fetch_assoc();
                        setcookie("login", $user['login'], time() + 604800, "/");
                        header("Location: index.php");
                    }
                    else {
                        $errorMessage = "Такого пользователя нет";
                    }
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
</head>
<body>
    <center>
        <form action="registration.php" method="post">
            <h1>Зарегестрироваться:</h1>
            <p>Логин:</p>
            <input type="text" name="login" id="" maxlength="30" required>
            <p>Пароль:</p>
            <input type="password" name="password" id="" minlength="6" maxlength="30" required><br><br>
            <p>Подтвердить пароль:</p>
            <input type="password" name="confirm_password" id="" minlength="6" maxlength="30" required><br>

            <?php if ($errorMessage): ?>
                <div style="color: red;"><?= htmlspecialchars($errorMessage) ?></div> <!-- Вывод ошибки -->
            <?php endif; ?>
            <button type="submit">Войти</button>
        </form>
    </center>

</body>
</html>