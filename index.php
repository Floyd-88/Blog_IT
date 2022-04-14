<?php
require "includes/config.php"; // подключаем файл с php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;1,300;1,400&display=swap" rel="stylesheet">
    <title><?php echo $config['title'] ?></title>
</head>

<body>
    <!-- HEADER -->
    <?php include "includes/header.php" ?>
    <!-- конец HEADER -->

    <div class="main">
        <div class="container">
            <div class="flex__block">

                <!-- основной контент -->
                <div class="flex__block-left">

                    <!-- Новый блок -->
                    <div class="flex__block-news">
                        <div class="new_block-title">
                            <div class="new_block-title-left">
                                <h3>Новейшее_в_блоге</h3>
                            </div>
                            <div class="new_block-title-right"><a href="/articles.php">Все записи</a></div>
                        </div>

                        <div class="new_block-info">

                        
                        <?php
                            $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 10"); //обращаемся к таблице articles в БД
                        ?>
                        <?php
                        while( $art = mysqli_fetch_assoc($articles) ) //перебираем строки
                        {
                        ?>
                            <div class="all__cards">
                                <!-- вставляем ссылку на фото из столбца таблицы БД -->
                                <img class="info-card-foto" src="img/<?php echo $art['image']; ?>" alt=""> 
                                <div class="info-card-wrap">

                                <!-- вставляем ссылку на статью из таблицы БД и название статьи -->
                                    <h4 class="info-card-title">
                                        <a href="/article.php?id=<?php echo $art['id']; ?>"> <?php echo $art['title']; ?> </a>
                                    </h4>
                                    <!-- вставляем категорию -->
                                    <h5 class="info-card-subtitle">
                                            <?php $art_cat = false;
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

                    <!-- конец блока -->

                    <!-- новый блок -->
                    <div class="flex__block-news">
                        <div class="new_block-title">
                            <div class="new_block-title-left">
                                <h3>Программирование</h3>
                            </div>
                            <div class="new_block-title-right">
                                <a href="/articles.php?categoria=1">Все записи</a>
                            </div>
                        </div>

                        <div class="new_block-info">
                            <?php
                                $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categoria_id` = 1 ORDER BY `id` DESC LIMIT 10"); //обращаемся к таблице articles в БД
                            ?>
                            <?php
                            while( $art = mysqli_fetch_assoc($articles) ) //перебираем строки
                            {
                            ?>
                                <div class="all__cards">
                                    <!-- вставляем ссылку на фото из столбца таблицы БД -->
                                    <img class="info-card-foto" src="img/<?php echo $art['image']; ?>" alt=""> 
                                    <div class="info-card-wrap">

                                        <!-- вставляем ссылку на статью из таблицы БД и название статьи -->
                                        <h4 class="info-card-title">
                                            <a href="/article.php?id=<?php echo $art['id']; ?>"> <?php echo $art['title']; ?> </a>
                                        </h4>
                                        <!-- вставляем категорию -->
                                        <h5 class="info-card-subtitle">
                                            <?php $art_cat = false;
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
                    <!-- конец блока -->

                    <!-- новый блок -->
                    <div class="flex__block-news ">
                        <div class="new_block-title">
                            <div class="new_block-title-left">
                                <h3>Авто</h3>
                            </div>
                            <div class="new_block-title-right">
                                <a href="/articles.php?categoria=2">Все записи</a>
                            </div>
                        </div>

                        <div class="new_block-info">
                            <?php
                                $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categoria_id` = 2 ORDER BY `id` DESC LIMIT 10"); //обращаемся к таблице articles в БД
                            ?>
                            <?php
                            while( $art = mysqli_fetch_assoc($articles) ) //перебираем строки
                            {
                            ?>
                                <div class="all__cards">
                                    <!-- вставляем ссылку на фото из столбца таблицы БД -->
                                    <img class="info-card-foto" src="img/<?php echo $art['image']; ?>" alt=""> 
                                    <div class="info-card-wrap">
                                        <!-- вставляем ссылку на статью из таблицы БД и название статьи -->
                                        <h4 class="info-card-title">
                                            <a href="/article.php?id=<?php echo $art['id']; ?>"> <?php echo $art['title']; ?> </a>
                                        </h4>
                                        <!-- вставляем категорию -->
                                        <h5 class="info-card-subtitle">
                                            <?php $art_cat = false;
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
                    <!-- конец блока -->

                    <!-- новый блок -->
                    <div class="flex__block-news">
                        <div class="new_block-title">
                            <div class="new_block-title-left">
                                <h3>Космос</h3>
                            </div>
                            <div class="new_block-title-right">
                                <a href="/articles.php?categoria=3">Все записи</a>
                            </div>
                        </div>

                        <div class="new_block-info">
                            <?php
                                $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categoria_id` = 3 ORDER BY `id` DESC LIMIT 10"); //обращаемся к таблице articles в БД
                            ?>
                            <?php
                            while( $art = mysqli_fetch_assoc($articles) ) //перебираем строки
                            {
                            ?>
                                <div class="all__cards">
                                    <!-- вставляем ссылку на фото из столбца таблицы БД -->
                                    <img class="info-card-foto" src="img/<?php echo $art['image']; ?>" alt=""> 
                                    <div class="info-card-wrap">
                                        <!-- вставляем ссылку на статью из таблицы БД и название статьи -->
                                        <h4 class="info-card-title">
                                            <a href="/article.php?id=<?php echo $art['id']; ?>"> <?php echo $art['title']; ?> </a>
                                        </h4>
                                        <!-- вставляем категорию -->
                                        <h5 class="info-card-subtitle">
                                            <?php $art_cat = false;
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

                    <!-- конец блока -->

                    <!-- новый блок -->
                    <div class="flex__block-news">
                        <div class="new_block-title">
                            <div class="new_block-title-left">
                                <h3>Все о еде</h3>
                            </div>
                            <div class="new_block-title-right">
                                <a href="/articles.php?categoria=4">Все записи</a>
                            </div>
                        </div>

                        <div class="new_block-info">
                            <?php
                                $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categoria_id` = 4 ORDER BY `id` DESC LIMIT 10"); //обращаемся к таблице articles в БД
                            ?>
                            <?php
                            while( $art = mysqli_fetch_assoc($articles) ) //перебираем строки
                            {
                            ?>
                                <div class="all__cards">
                                    <!-- вставляем ссылку на фото из столбца таблицы БД -->
                                    <img class="info-card-foto" src="img/<?php echo $art['image']; ?>" alt=""> 
                                    <div class="info-card-wrap">
                                    <!-- вставляем ссылку на статью из таблицы БД и название статьи -->
                                        <h4 class="info-card-title">
                                            <a href="/article.php?id=<?php echo $art['id']; ?>"> <?php echo $art['title']; ?> </a>
                                        </h4>
                                        <!-- вставляем категорию -->
                                        <h5 class="info-card-subtitle">
                                            <?php $art_cat = false;
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

                    <!-- конец блока -->

                    <!-- новый блок -->
                    <div class="flex__block-news">
                        <div class="new_block-title">
                            <div class="new_block-title-left">
                                <h3>Природа</h3>
                            </div>
                            <div class="new_block-title-right">
                                <a href="/articles.php?categoria=5">Все записи</a>
                            </div>
                        </div>

                        <div class="new_block-info">
                           <?php
                                $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categoria_id` = 5 ORDER BY `id` DESC LIMIT 10"); //обращаемся к таблице articles в БД
                            ?>
                            <?php
                            while( $art = mysqli_fetch_assoc($articles) ) //перебираем строки
                            {
                            ?>
                                <div class="all__cards">
                                    <!-- вставляем ссылку на фото из столбца таблицы БД -->
                                    <img class="info-card-foto" src="img/<?php echo $art['image']; ?>" alt=""> 
                                    <div class="info-card-wrap">

                                    <!-- вставляем ссылку на статью из таблицы БД и название статьи -->
                                        <h4 class="info-card-title">
                                            <a href="/article.php?id=<?php echo $art['id']; ?>"> <?php echo $art['title']; ?> </a>
                                        </h4>
                                        <!-- вставляем категорию -->
                                        <h5 class="info-card-subtitle">
                                            <?php $art_cat = false;
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
                    <!-- конец блока -->

                    <!-- новый блок -->
                    <div class="flex__block-news">
                        <div class="new_block-title">
                            <div class="new_block-title-left">
                                <h3>Разное</h3>
                            </div>
                            <div class="new_block-title-right">
                                <a href="/articles.php?categoria=6">Все записи</a>
                            </div>
                        </div>

                        <div class="new_block-info">
                            <?php
                                $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categoria_id` = 6 ORDER BY `id` DESC LIMIT 10"); //обращаемся к таблице articles в БД
                            ?>
                            <?php
                            while( $art = mysqli_fetch_assoc($articles) ) //перебираем строки
                            {
                            ?>
                                <div class="all__cards">
                                    <!-- вставляем ссылку на фото из столбца таблицы БД -->
                                    <img class="info-card-foto" src="img/<?php echo $art['image']; ?>" alt=""> 
                                    <div class="info-card-wrap">
                                    <!-- вставляем ссылку на статью из таблицы БД и название статьи -->
                                        <h4 class="info-card-title">
                                            <a href="/article.php?id=<?php echo $art['id']; ?>"> <?php echo $art['title']; ?> </a>
                                        </h4>
                                        <!-- вставляем категорию -->
                                        <h5 class="info-card-subtitle">
                                            <?php $art_cat = false;
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
                    <!-- конец блока -->
                </div>
                <!-- конец основоного контента -->

                <!-- боковой сайдбар -->
                <?php include "includes/sidebar.php"?>
                <!-- конец бокового сайдбара -->

                
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <?php include "includes/footer.php" ?>
    <!-- конец FOOTER -->





</body>

</html>