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

            <?php
                $article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);
            if( mysqli_num_rows($article) <= 0 ) 
            
            {
            ?>
            <!-- основной контент -->
                <div class="flex__block-left">
                    <div class="flex__block-news new_block">
                        <div class="new_block-title">
                            <div class="new_block-title-left">
                                <h3>Статья не найдена</h3>
                            </div>
                        </div>
                        <p>Запрашиваемая Вами статья не существует</p>
                    </div>
                </div>
            <?php
            }else 
            {
                $art = mysqli_fetch_assoc($article);
                mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = " . (int) $art['id']);
                ?>

                <div class="flex__block-left">
                    <div class="flex__block-news new_block">
                        <div class="new_block-title">
                            <div class="new_block-title-left">
                                <h3><?php echo $art['title']; ?></h3>
                            </div>
                            <div class="number__views"><a href="#"><?php echo $art['views']; ?> просмотров</a></div>
                        </div>
                        <div class="new_block-content">
                            <img src="/img/<?php echo $art['image'];?>" alt="">
                            <p><?php echo $art['text']; ?></p>
                        </div>

                <!-- Комментарии -->
                        <div class="new_block-title">
            <div class="new_block-title-left">
                <h3>Комментарии</h3>
            </div>
            
        </div>

        <div class="new_block-info">       
            <?php
                $comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `articels_id` = " . (int) $art["id"]. " ORDER BY `id` DESC"); //обращаемся к таблице articles в БД
                if(mysqli_num_rows($comments) <= 0) {
                    echo "<p class='no_coments'>". "Нет комментариев!". "</p>";
                };
            ?>
            <?php
                while( $comment = mysqli_fetch_assoc($comments) ) //перебираем строки
                    {
            ?>
            <div class="all__cards new_block-info-card">
                <!-- вставляем ссылку на фото из столбца таблицы БД -->
                <img class="info-card-foto" src="https://ru.gravatar.com/avatar/<?php echo md5($comment['email']) ?>" alt=""> 
                <div class="info-card-wrap">

                    <!-- вставляем ссылку на статью из таблицы БД и название статьи -->
                    <h4 class="info-card-title"><a href="/article.php?id=<?php echo $comment['articels_id']; ?>"> <?php echo $comment['author']; ?> </a></h4>
                    <!-- вставляем категорию -->
                    
                        <!-- вставляем текст из статьи -->
                        <p class="info-card-text"><?php echo $comment['text']; ?>
                        </p>
                </div>
            </div>
                    <?php
                    }
                    ?>
                        
                    
        </div>
      
                    </div>   
        
        <div id="block" class="block">
            <h3 class = "new_comment">Добавить свой комментарий</h3>
            <div class="block_content">
                <form method="POST" action="/article.php?id=<?php echo $art['id']; ?> #block">

                    <?php 
                    
                    if( isset($_POST['do_post']))
                    {
                        $erros = array();

                        if( $_POST['name'] == "" ) {
                            $erros[] = "Введите имя";
                        };
                        if( $_POST['nickname'] == "" ) {
                            $erros[] = "Введите Ваш никнейм";
                        };
                        if( $_POST['email'] == "" ) {
                            $erros[] = "Введите e-mail";
                        };
                        if( $_POST['text'] == "" ) {
                            $erros[] = "Введите текст комментария";
                        };

                        if( empty($erros)) {

                            mysqli_query($connection, "INSERT INTO `comments` ( `author`, `nickname`, `email`, `text`, `articels_id` ) VALUES ( '".$_POST['name']."', '".$_POST['nickname']."', '".$_POST['email']."', '".$_POST['text']."', '".$art['id']."') ");

                            echo '<span style="color: green; font-weight: bold; display:block; margin: 10px;">'. "Комментарий успешно добавлен". "<br>".'</span>';

                        }else {
                           echo '<span style="color: red; font-weight: bold; display:block; margin: 10px;">'. $erros['0']. "<br>".'</span>';
                        }
                    }
                    
                    ?>

                    <div class="form__input">
                        <input name="name" value="<?php echo $_POST["name"] ?>" type="text" placeholder="введите имя">
                        <input name="nickname" value="<?php echo $_POST["nickname"] ?>" type="text" placeholder="введите никнейм">
                        <input class="form__input-email" name="email" value="<?php echo $_POST["email"] ?>" type="text" placeholder="введите email(будет скрыт на сайте)">
                    </div>
                    <div class="form__text">
                        <textarea name="text" name="" id="" cols="30" rows="10" placeholder="текст комментария..."><?php echo $_POST["text"] ?></textarea>
                    </div>
                    <input class="form__btn" name="do_post" type="submit">
 

                </form>
            </div>
        </div>                 
                </div>
            <?php
            }
            ?>
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