<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить рецепт</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="new-recipe-card">
    <h1>Добавить рецепт</h1>
    <form method="post" action="addRecipe.php" class="new-recipe-form">
        <input type="text" name="title" placeholder="Название рецепта" required>
        <textarea name="ingredients" placeholder="Ингредиенты" required></textarea>
        <textarea name="instructions" placeholder="Инструкции" required></textarea>
        <button type="submit">Добавить рецепт</button>
    </form>
</div>
</body>
</html>
