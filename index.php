<?php
    require "includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title']; ?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>

  <div id="wrapper">

    <?php require "includes/header.php"?>

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <a href="/articles.php">Все записи</a>
              <h3>Новейшее в блоге</h3>
              <div class="block__content">
                  <div class="articles articles__horizontal">
                      <?php
                      $articles = mysqli_query($connection,"SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 4");
                      while ($art = mysqli_fetch_assoc($articles)){
                          ?>
                          <article class="article">
                              <div class="article__image" style="background-image: url(/static/images/<?= $art['image']?>);"></div>
                              <div class="article__info">
                                  <a href="pages/article.php?id=<?= $art['id']?>"><?= $art['title']?></a>
                                  <div class="article__info__meta">
                                      <?php
                                        $art_cat = false;
                                        foreach ($categories as $cat){
                                            if ($cat['id'] == $art['category_id']) {
                                                $art_cat = $cat;
                                                break;
                                            }
                                        }
                                      ?>
                                      <small>Категория: <a href="/articles.php?category =
                                      <?php echo $art_cat['id']; ?>"><?= $art_cat['title']?></a></small>
                                  </div>
                                  <div class="article__info__preview"><?= mb_substr(strip_tags($art['text']),0, 100, 'utf-8').' ...'?></div>
                              </div>
                          </article>
                          <?php
                      }
                      ?>
                  </div>
              </div>
            </div>

            <div class="block">
              <a href="/articles.php?category=5">Все записи</a>
              <h3>Безопасность</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                    <?php
                    $articles = mysqli_query($connection,"SELECT * FROM `articles` WHERE `category_id` = 5 ORDER BY `id` DESC LIMIT 4");
                    while ($art = mysqli_fetch_assoc($articles)){
                        ?>
                        <article class="article">
                            <div class="article__image" style="background-image: url(/static/images/<?= $art['image']?>);"></div>
                            <div class="article__info">
                                <a href="pages/article.php?id=<?= $art['id']?>"><?= $art['title']?></a>
                                <div class="article__info__meta">
                                    <?php
                                    $art_cat = false;
                                    foreach ($categories as $cat){
                                        if ($cat['id'] == $art['category_id']) {
                                            $art_cat = $cat;
                                            break;
                                        }
                                    }
                                    ?>
                                    <small>Категория: <a href="/articles.php?category =
                                      <?php echo $art_cat['id']; ?>"><?= $art_cat['title']?></a></small>
                                </div>
                                <div class="article__info__preview"><?= mb_substr(strip_tags($art['text']),0, 100).' ...'?></div>
                            </div>
                        </article>
                        <?php
                    }
                    ?>

                </div>
              </div>
            </div>

            <div class="block">
              <a href="pages/articles.php?category=4">Все записи</a>
              <h3>Программирование</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                    <?php
                    $articles = mysqli_query($connection,"SELECT * FROM `articles` WHERE `category_id` = 4 ORDER BY `id` DESC LIMIT 4");
                    while ($art = mysqli_fetch_assoc($articles)){
                        ?>
                        <article class="article">
                            <div class="article__image" style="background-image: url(/static/images/<?= $art['image']?>);"></div>
                            <div class="article__info">
                                <a href="pages/article.php?id=<?= $art['id']?>"><?= $art['title']?></a>
                                <div class="article__info__meta">
                                    <?php
                                    $art_cat = false;
                                    foreach ($categories as $cat){
                                        if ($cat['id'] == $art['category_id']) {
                                            $art_cat = $cat;
                                            break;
                                        }
                                    }
                                    ?>
                                    <small>Категория: <a href="pages/articles.php?category =
                                      <?php echo $art_cat['id']; ?>"><?= $art_cat['title']?></a></small>
                                </div>
                                <div class="article__info__preview"><?= mb_substr(strip_tags($art['text']),0, 100).' ...'?></div>
                            </div>
                        </article>
                        <?php
                    }
                    ?>

                </div>
              </div>
            </div>
          </section>
          <section class="content__right col-md-4">
              <?php include "includes/sidebar.php"?>
          </section>
        </div>
      </div>
    </div>
      <?php include "includes/footer.php"?>
  </div>

</body>
</html>