<?php
include "../includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $config['title']?></title>

    <!-- Bootstrap Grid -->
    <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>

<div id="wrapper">
    <?php include "../includes/header.php"?>
    <?php
    $article = mysqli_query($connection,"SELECT * FROM `articles` WHERE `id` = ". (int)$_GET['id']);
    $comments = mysqli_query($connection,
        "SELECT * FROM `comments` WHERE `article_id` = ".(int)$_GET['id']." ORDER BY `id` DESC LIMIT 5");
    if(mysqli_num_rows($article) <=0){
        ?>
        <div id="content">
            <div class="container">
                <div class="row">
                    <section class="content__left col-md-8">
                        <div class="block">
                            <h3>Статья не найдена.</h3>
                            <div class="block__content">
                                <div class="full-text">
                                    <p>Запрашиваемая Вами статья не найдена.</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="content__right col-md-4">
                        <?php include "../includes/sidebar.php";?>
                    </section>
                </div>
            </div>
        </div>
        <?php
    }else{
        $art = mysqli_fetch_assoc($article);
        mysqli_query($connection,"UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = ".(int)$_GET['id']);
        ?>
        <div id="content">
            <div class="container">
                <div class="row">
                    <section class="content__left col-md-8">
                        <div class="block">
                            <a><?= $art['views']?> просмотров</a>
                            <h3><?= $art['title']?></h3>
                            <div class="block__content">
                                <img src="/static/images/<?= $art['image']?>" style="max-width: 100%">
                                <div class="full-text">
                                    <p><?= $art['text']?></p>
                                </div>
                            </div>
                        </div>
                        <div class="block">
                            <a href="#comment-add-form">Добавить свой</a>
                            <h3>Комментарии</h3>
                            <div class="block__content">
                                <div class="articles articles__vertical">

                                    <?php

                                    if (mysqli_num_rows($comments) <= 0){
                                        echo "Нет комментариев";
                                    }
                                    while ($comment = mysqli_fetch_assoc($comments)){
                                        ?>
                                        <article class="article">
                                            <div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/<?php echo md5($comment['email'])?>?s=125)"></div>
                                            <div class="article__info">
                                                <a href="/article.php?id=<?= $comment['article_id']?>"><?= $comment['author']?></a>
                                                <div class="article__info__meta"></div>
                                                <div class="article__info__preview"><?= $comment['text']?></div>
                                            </div>
                                        </article>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <div id="comment-add-form" class="block">
                            <h3>Добавить комментарий</h3>
                            <div class="block__content">
                                <form class="form" method="POST" action="/pages/article.php?id=<?= $art['id'];?>#comment-add-form">
                                    <?php
                                        if (isset($_POST['do_post'])){
                                            $errors = array();

                                            if ($_POST['name'] == ''){
                                                $errors[] = 'Введите имя.';
                                            }

                                            if ($_POST['nickname'] == ''){
                                                $errors[] = 'Введите ваш никнейм.';
                                            }

                                            if ($_POST['email'] == ''){
                                                $errors[] = 'Введите ваш email.';
                                            }

                                            if ($_POST['text'] == ''){
                                                $errors[] = 'Введите текст комментария.';
                                            }

                                            if (empty($errors)){
                                                mysqli_query($connection,
                                                    "INSERT INTO `comments`(`author`,`email`,`nickname`,`text`,`pubdate`,`article_id`) VALUES ('".$_POST['name']."',
                                                    '".$_POST['email']."', '".$_POST['nickname']."', '".$_POST['text']."', NOW(), '".$art['id']."')");
                                                echo '<span style="color: green;font-weight: bold;margin-bottom: 10px;display: block;">'
                                                    .'Комментарий успешно добавлен'.'</span>';
                                            }else{
                                                echo '<span style="color: darkred;font-weight: bold;margin-bottom: 10px;display: block;">'
                                                    .$errors['0'].'</span>';
                                            }
                                        }
                                    ?>
                                    <div class="form__group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" class="form__control" name="name" placeholder="Имя" value="<?= $_POST['name']?>">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form__control" name="nickname" placeholder="Никнейм" value="<?= $_POST['nickname']?>">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form__control" name="email" placeholder="Email" value="<?= $_POST['email']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form__group">
                                        <textarea class="form__control" name="text" placeholder="Текст комментария ..."><?= $_POST['text']?></textarea>
                                    </div>
                                    <div class="form__group">
                                        <input type="submit" class="form__control" name="do_post" value="Добавить комментарий">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                    <section class="content__right col-md-4">
                        <?php include "../includes/sidebar.php";?>
                    </section>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <?php include "../includes/footer.php"?>
</div>

</body>
</html>