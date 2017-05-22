<?php
require "../includes/config.php";
session_start();
$check_authentication = $_SESSION['login'];
if (!isset($check_authentication)) {
    echo "Вы не вошли под своей учетной записью."."<br/>";
    echo "<a href='../admin-login.php'>Войти</a>";
    exit();
}
$comment_id = $_GET['id'];
$delete_comment_q = "DELETE FROM `comments` WHERE `id` = $comment_id";
mysqli_query($connection,$delete_comment_q);
header('Location: ../edit-comments.php')
?>