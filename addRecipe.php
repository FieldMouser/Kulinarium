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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $ingredients = $_POST['ingredients'];
        $instructions = $_POST['instructions'];
        $poster = isset($_COOKIE['login']) ? $_COOKIE['login']:'';
        if (!empty($poster)){
            $sql = $conn->prepare("INSERT INTO recipes (user_name, title, ingredients, instructions) VALUES (?, ?, ?, ?)");
            $sql->execute([$poster, $title, $ingredients, $instructions]);

        } 
        else {
            echo '<h1>Для добавления рецепта вам нужно войти в аккаунт!</h1><br> <a href="login.php">Войти</a> <br> или <br> 
            <a href="registration.php">Войти</a>'; 
        }
        
        
        
    }
    
    ?>