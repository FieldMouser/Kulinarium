<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить рецепт</title>
</head>
<body>
<form method="post" action="addRecipe.php">
         <input type="text" name="title" placeholder="Название рецепта" required>
         <textarea name="ingredients" placeholder="Ингредиенты" required></textarea>
         <textarea name="instructions" placeholder="Инструкции" required></textarea>
         <button type="submit">Добавить рецепт</button>
     </form>
</body>
</html>


