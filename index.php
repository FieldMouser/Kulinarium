<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кулинарий!</title>
</head>
<body>
    <header>
        <h1>Кулинарий!</h1>
            $login = isset($_COOKIE['login']) ? $_COOKIE['login']:'';
            if (!empty($login)){
                echo "<p>Вы вошли как $login </p> <p><a href='logout.php'>(Выйти)</p> ";
            } 
            else {
                echo '<p><a href="login.php">Войти</a></p>' <p><a href="registration.php">Зарегистрироваться</a></p>; 
            }
            
        ?>
    </header>
    <div class="content"></div>
    <footer><center>Пока еще тестовая страница</center></footer>
</body>
</html>