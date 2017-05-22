<?php
require "includes/config.php";
session_start();
$check_authentication = $_SESSION['login'];
if (!isset($check_authentication)) {
    echo "Вы не вошли под своей учетной записью."."<br/>";
    echo "<a href='admin-login.php'>Войти</a>";
    exit();
}
$comments_q = "SELECT * FROM `comments`";
$comments = mysqli_query($connection, $comments_q);
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Комментарии</title>
    <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">
    <link rel="stylesheet" href="/media/css/new-article.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
</head>
<body>
<div style="margin: 10px;">
    <a  style="color: white;" href="admin.php">Назад</a>
</div>
<div class="new-article">

        <section class="content__left col-md-12">
            <?php
            while ($comment = mysqli_fetch_assoc($comments)){
                ?>
                <div style="margin: 5px">
                    <p>Автор: <?= $comment["author"];?></p>
                    <p>Текст: <?= $comment["text"];?></p>
                    <a href="services/delete-comment.php?id=<?= $comment['id'];?>">Удалить</a>
                </div>
                <hr/>
                <?php
            }
            ?>
        </section>

</body>
</html>

