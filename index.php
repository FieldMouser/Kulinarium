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
                echo "<p>Вы вошли как $login </p> <p><a href='logout.php'>Выйти</a></p> ";
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

            if (!empty($login)){
                echo '<p><a href="newRecipe.php" class="newRecipe">Создать свой рецепт</a></p>';
            }
                    
            $sql = $conn->query("SELECT * FROM recipes ORDER BY id DESC");


            if ($sql && $sql->num_rows > 0) {
                while ($recipe = $sql->fetch_assoc()) {
                    $title = strip_tags($recipe['title']);
                    $user_name = strip_tags($recipe['user_name']);
                    $ingredients = strip_tags($recipe['ingredients']);
                    $instructions = strip_tags($recipe['instructions']);
                    echo "<div class='recipe-card'>";
                    echo "<h2 class='recipe-title'>{$title}</h2>";
                    echo "<p class='recipe-ingredients'>Создал рецепт: {$user_name}</p>";
                    echo "<p class='recipe-ingredients'>Ингредиенты: {$ingredients}</p>";
                    echo "<p class='recipe-instructions'>Инструкции: {$instructions}</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Нет рецептов для отображения.</p>";
            }
          
        

            $conn->close(); // Закрываем соединение
        
   
                
            ?>
        </center>
    </div>
    <footer><center><p>Пока еще тестовая страница</p></center></footer>
</body>
</html>