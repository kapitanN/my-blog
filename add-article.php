<?php require "includes/config.php";?>
<?php
session_start();
$cat = $_POST['category'];
$category_id_q = mysqli_query($connection,"SELECT * FROM `articles_categories` WHERE `title` = '$cat'");
$title = $_POST['title'];
$image = $_POST['image'];
$text = $_POST['text'];
$category_id = mysqli_fetch_assoc($category_id_q)['id'];
$date = date("Y-m-d H:i:s");

$add_article_query = "INSERT INTO `articles`(`title`,`image`,`text`,`category_id`,`pubdate`)
  VALUES ('$title','$image','$text','$category_id', '$date')";

mysqli_query($connection, $add_article_query);

$_SESSION['title'] = $title;
$_SESSION['text'] = $text;
?>
<?php
header('Location: new-article.php');
?>
