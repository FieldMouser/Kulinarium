<?php

    session_start();

    $serverName = "localhost";
    $username = "u2852904_Login_E";
    $password = "Adm1n_L0gin_3254";
    $dbName = "u2852904_default";

    //создание соединения
    $conn = new mysqli($serverName, $username, $password, $dbName);

    // Проверка соединения
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Проверка авторизации
    

    // Обработка формы логина
    


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
    <form action="login.php" method="post">
        <h1>Войти:</h1>
        <p>Логин:</p>
        <input type="text" name="login" id="">
        <p>Пароль:</p>
        <input type="password" name="password" id=""><br><br>
        <button type="submit">Войти</button>
    </form>
</body>
</html>