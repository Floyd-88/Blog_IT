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


                <!-- ------ -->
                    <div class="flex__block-news new_block">
                        <div class="new_block-title">
                            <div class="new_block-title-left">
                                <h3>Все статьи</h3>
                            </div>
                        </div>

                        <div class="new_block-info">

                        
                        <?php
                            $per_page = 4;
                            $page = 1;
                            if( isset($_GET['page']) ) {
                                $page = (int) $_GET['page'];
                            };

                            $total_count_q = mysqli_query($connection, "SELECT COUNT('id') AS 'total_count' FROM `articles`");
                            $total_count = mysqli_fetch_assoc($total_count_q);
                            $total_count = $total_count['total_count'];

                            $total_pages = ceil($total_count / $per_page);
                            if($page <= 1 || $page > $total_pages) {
                                $page = 1;
                            }
                            $offset = ($per_page * $page) - $per_page;                          
                            $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT $offset, $per_page"); //обращаемся к таблице articles в БД
                        
                            $articles_exist = true;
                            if(mysqli_num_rows($articles) <= 0) {
                                echo 'Статей не найдено!';
                                $articles_exist = false;
                            }
                        
                        ?>
                        <?php
                        while( $art = mysqli_fetch_assoc($articles) ) //перебираем строки
                        {
                        ?>
                            <div class="all__cards new_block-info-card">
                                <!-- вставляем ссылку на фото из столбца таблицы БД -->
                                <img class="info-card-foto" src="img/<?php echo $art['image']; ?>" alt=""> 
                                <div class="info-card-wrap">

                                <!-- вставляем ссылку на статью из таблицы БД и название статьи -->
                                    <h4 class="info-card-title"><a href="/article.php?id=<?php echo $art['id']; ?>"> <?php echo $art['title']; ?> </a></h4>
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
                                    ?>Категория: <a href="/articles.php?categorie=<?php echo $art_cat['id']; ?>"> <?php echo $art_cat['title']; ?> </a></h5>
                                    <!-- вставляем текст из статьи -->
                                    <p class="info-card-text"><?php echo mb_substr(strip_tags($art['text']), 0, 50, 'utf-8'). '...'; ?>
                                    </p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        </div>

                        <?php 
                             if($articles_exist == true) 
                             {
                              echo '<div class="paginator">';
                              if( $page > 1 ) 
                              {
                                  echo '<a href="/articles.php?page='.($page - 1).'">&laquo;   Прошлая страница</a>    ';
                              }
                              if( $page < $total_pages) 
                              {
                                  echo '    <a href="/articles.php?page='.($page + 1).'">   Следующая страница &raquo;</a>';
                              }
                              echo '</div>';
                            }
                        ?>
                    </div>

                <!-- ----- -->

                    <!-- ----- -->

                </div>
                

                <!-- конец основоного контента -->

                <!-- боковой сайдбар -->
                <?php include "includes/sidebar.php" ?>
                <!-- конец бокового сайдбара -->

            </div>
        </div>
    </div>
    </div>

    <!-- FOOTER -->
    <?php include "includes/footer.php" ?>
    <!-- конец FOOTER -->





</body>

</html>