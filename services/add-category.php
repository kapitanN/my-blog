<?php
require "../includes/config.php";
session_start();
$check_authentication = $_SESSION['login'];
if (!isset($check_authentication)) {
    echo "Вы не вошли под своей учетной записью."."<br/>";
    echo "<a href='../admin-login.php'>Войти</a>";
    exit();
}
$category_name = $_POST['category_name'];
$add_category_q = "INSERT INTO `articles_categories` (`title`) VALUE ('$category_name')";
mysqli_query($connection,$add_category_q);
header('Location: ../new-category.php')
?>

