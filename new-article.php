<?php
require "includes/config.php";
session_start();
$categories_q = mysqli_query($connection,"SELECT * FROM `articles_categories`");
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
<div style="margin: 10px;">
    <a  style="color: white;" href="admin.php">Назад</a>
</div>
<div class="new-article">
    <form name='new-article-form' action="services/add-article.php" method="post">
        <section class="content__left col-md-8">
            <input type="text" placeholder="Название статьи" required = "" name="title" value="<?=$_SESSION['title']?>"><br/>
            <input type="text" placeholder="Текст статьи" required = "" name="text" style="height: 200px;" value="<?= $_SESSION['text']?>"><br/>

        </section>
        <section class="content__right col-md-4">
            <input type="text" placeholder="Добавить изображение к статье" required = "" name="image"><br/>
            <p style="margin: 5px; color: white">Категория:</p>
            <select placeholder="Категория" required = "" name="category">
                <?php
                while ($cat = mysqli_fetch_assoc($categories_q)) {
                    ?>
                    <option><?php echo $cat['title']?></option>;
                    <?php
                }
                ?>
            </select><br/>
            <input type="submit" value="Опубликовать">
        </section>
    </form>
</body>
</html>
