<?php
session_start();

$login = isset($_COOKIE['login']) ? $_COOKIE['login'] : '';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кулинарий!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Кулинарий!</h1>
                <?php
            
            if (!empty($login)){
                echo "<p>Вы вошли как $login </p> <p><a href='logout.php'>(Выйти)</a></p> ";
            } 
            else {
                echo '<p><a href="login.php">Войти</a></p> <p><a href="registration.php">Зарегистрироваться</a></p>'; 
            }
            
        ?>
    </header>
    <div class="content">
        <center>
        <?php

            

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
                    
            $sql = $conn->query("SELECT * FROM recipes");

            if ($sql && $sql->num_rows > 0) {
                while ($recipe = $sql->fetch_assoc()) {
                    echo "<div class='recipe-card'>";
                    echo "<h2 class='recipe-title'>{$recipe['title']}</h2>";
                    echo "<p class='recipe-ingredients'>Создал рецепт: {$recipe['user_name']}</p>";
                    echo "<p class='recipe-ingredients'>Ингредиенты: {$recipe['ingredients']}</p>";
                    echo "<p class='recipe-instructions'>Инструкции: {$recipe['instructions']}</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Нет рецептов для отображения.</p>";
            }

            if (!empty($login)){
                echo '<p class="newRecipe"><a href="newRecipe.php">Создать свой рецепт</a></p>';
            } 

            $conn->close(); // Закрываем соединение
        
   
                
            ?>
        </center>
    </div>
    <footer><center><p>Пока еще тестовая страница</p></center></footer>
</body>
</html>