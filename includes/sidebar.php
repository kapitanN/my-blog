
<div class="block">
    <h3>Топ читаемых статей</h3>
    <div class="block__content">
        <div class="articles articles__vertical">

            <?php
            $articles = mysqli_query($connection,"SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 5");
            while ($art = mysqli_fetch_assoc($articles)){
                ?>
                <article class="article">
                    <div class="article__image" style="background-image: url(/static/images/<?= $art['image'];?>)"></div>
                    <div class="article__info">
                        <a href="/pages/article.php?id=<?= $art['id']?>"><?= $art['title']?></a>
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
                            <small>Категория: <a href="/articles.php?category =<?= $art_cat['id']; ?>"><?= $art_cat['title']?></a></small>
                        </div>
                        <div class="article__info__preview"><?= mb_substr(strip_tags($art['text']),0, 60).' ...'?></div>
                    </div>
                </article>
                <?php
            }
            ?>

        </div>
    </div>
</div>

<div class="block">
    <h3>Комментарии</h3>
    <div class="block__content">
        <div class="articles articles__vertical">

            <?php
            $comments = mysqli_query($connection,"SELECT * FROM `comments` ORDER BY `id` DESC LIMIT 5");
            while ($comment = mysqli_fetch_assoc($comments)){
                ?>
                <article class="article">
                    <div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/<?php echo md5($comment['email'])?>?s=125)"></div>
                    <div class="article__info">
                        <a href="/pages/article.php?id=<?= $comment['article_id']?>"><?= $comment['author']?></a>
                        <div class="article__info__meta"></div>
                        <div class="article__info__preview"><?= mb_substr(strip_tags($comment['text']),0, 60).' ...'?></div>
                    </div>
                </article>
                <?php
            }
            ?>

        </div>
    </div>
</div>