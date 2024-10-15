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
            $login = isset($_COOKIE['login']) ? $_COOKIE['login']:'';
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
        if (!empty($login)){
            echo '<p><a href="newRecipe.php">Создать свой рецепт</a></p>';
        } 
                ?>
        </center>
    </div>
    <footer><center><p>Пока еще тестовая страница</p></center></footer>
</body>
</html>