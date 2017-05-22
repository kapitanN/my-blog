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
    <title>Добавление категории</title>
    <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">
    <link rel="stylesheet" href="/media/css/new-article.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
</head>
<body>
<div style="margin: 10px;">
    <a  style="color: white;" href="admin.php">Назад</a>
</div>
<div class="new-article">
    <form name='new-category-form' action="services/add-category.php" method="post">
        <section class="content__left col-md-8">
            <input type="text" placeholder="Название категории" required = "" name="category_name" value="<?=$_SESSION['category_name']?>"><br/>
            <input type="submit" value="Создать">
        </section>
    </form>
</body>
</html>
