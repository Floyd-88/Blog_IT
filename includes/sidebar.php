<div class="flex__block-right">
    <div class="flex__block-news we_know">
        <h3 class="we_know-title">Мы_знаем</h3>
        <img class="we_know-foto" src="../img/world.png" alt="world">
    </div>

    <div class="flex__block-news top_reeds">
        <div class="new_block-title">
            <div class="new_block-title-left">
                <h3>Топ читаемых</h3>
            </div>
        </div>

        <div class="new_block-info">       
            <?php
                $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 5"); //обращаемся к таблице articles в БД
            ?>
            <?php
            while( $art = mysqli_fetch_assoc($articles) ) //перебираем строки
            {
            ?>
                <div class="sidebar__info">
                    <!-- вставляем ссылку на фото из столбца таблицы БД -->
                    <img class="info-card-foto" src="../img/<?php echo $art['image']; ?>" alt=""> 
                    <div class="info-card-wrap">

                        <!-- вставляем ссылку на статью из таблицы БД и название статьи -->
                        <h4 class="info-card-title">
                            <a href="/article.php?id=<?php echo $art['id']; ?>"> <?php echo $art['title']; ?> </a>
                        </h4>
                        <!-- вставляем категорию -->
                        <h5 class="info-card-subtitle">
                            <?php 
                                $art_cat = false;
                                foreach($categories as $cat) //перебераем массив полученный в header
                                    {
                                    if($cat['id'] == $art['categoria_id']) {
                                    $art_cat = $cat;
                                    break;
                                            }
                                    }
                            ?>Категория: <a href="/articles.php?categorie=<?php echo $art_cat['id']; ?>"> <?php echo $art_cat['title']; ?> </a>
                        </h5>
                        <!-- вставляем текст из статьи -->
                        <p class="info-card-text">
                            <?php echo mb_substr(strip_tags($art['text']), 0, 50, 'utf-8'). '...'; ?>
                        </p>
                </div>
        </div>
            <?php
            }
            ?>
        </div>
    </div>
                    
       <!-- ------ -->         
    <div class="flex__block-news comments">
        <div class="new_block-title">
            <div class="new_block-title-left">
                <h3>Комментарии</h3>
            </div>
        </div>

        <div class="new_block-info">       
            <?php
                $comments = mysqli_query($connection, "SELECT * FROM `comments` ORDER BY `id` DESC LIMIT 5"); //обращаемся к таблице articles в БД
            ?>
            <?php
                while( $comment = mysqli_fetch_assoc($comments) ) //перебираем строки
                    {
            ?>
            <div class="sidebar__info">
                <!-- вставляем ссылку на фото из столбца таблицы БД -->
                <img class="info-card-foto" src="https://ru.gravatar.com/avatar/<?php echo md5($comment['email']) ?>" alt=""> 
                <div class="info-card-wrap">
                    <!-- вставляем ссылку на статью из таблицы БД и название статьи -->
                    <h4 class="info-card-title">
                        <a href="/article.php?id=<?php echo $comment['articels_id']; ?>"> <?php echo $comment['author']; ?> </a>
                    </h4>
                    <!-- вставляем категорию -->
                    
                        <!-- вставляем текст из статьи -->
                        <p class="info-card-text">
                            <?php echo mb_substr(strip_tags($comment['text']), 0, 50, 'utf-8'). '...'; ?>
                        </p>
                </div>
            </div>
                    <?php
                    }
                    ?>
        </div>
        <!-- ------ -->
    </div>
</div>