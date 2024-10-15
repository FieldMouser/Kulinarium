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
    /*
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $ingredients = $_POST['ingredients'];
        $instructions = $_POST['instructions'];

        $stmt = $conn->prepare("INSERT INTO recipes (title, ingredients, instructions) VALUES (?, ?, ?)");
        $stmt->execute([$title, $ingredients, $instructions]);
        
    }
    */
    ?>