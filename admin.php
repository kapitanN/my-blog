<?php
session_start();
$check_authentication = $_SESSION['login'];
if (!isset($check_authentication)) {
    echo "Вы не вошли под своей учетной записью."."<br/>";
    echo "<a href='admin-login.php'>Войти</a>";
    exit();
}
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Новая статья</title>
    <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">
    <link rel="stylesheet" href="/media/css/new-article.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
</head>
<body>
<div>
    <button type='button'><a href='new-article.php'>Добавить статью</button><br/>
    <button type='button'><a href='new-category.php'>Добавить категорию</button><br/>
    <button type='button'><a href='edit-comments.php'>Редактировать комментарии</button><br/>
</div>
</body>
</html>
