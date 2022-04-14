<?php
require "../includes/config.php"; // подключаем файл с php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;1,300;1,400&display=swap" rel="stylesheet">
    <title><?php echo $config['title'] ?></title>
</head>

<body>
    <!-- HEADER -->
    <?php include "../includes/header.php" ?>
    <!-- конец HEADER -->

    <div class="main">
        <div class="container">
            <div class="flex__block">

            <!-- основной контент -->
                <div class="flex__block-left">

                    <div class="flex__block-news new_block">
                        <div class="new_block-title">
                            <div class="new_block-title-left">
                                <h3 class="about_title">Обо мне</h3>
                            </div>
                        </div>
                        <div class="about_me">
                            <div class="about_me_image">
                                <img src="../img/about_me/designer_photo.png" alt="about me">
                            </div>

                            <div class="about_me_text">
                                <p class="about_me_text_p">Меня зовут Илья, мне 33 года, за это время я успел поработать в ряде крупных компаний как на технических должностях, так и на руководящих, при этом самый первый мой опыт работ, хоть и не долгий, был связан с IT-сферой в далеком
                                2011 году. И хоть я и решил связать свою судьбу в дальнейшем с другими отраслями, в глубине души IT меня никогда не оставляла. 
                                </p>
                                <p class="about_me_text_p">И вот я решил вернуться к тому, с чего начинал свою карьеру, однако за долгие годы данная сфера шагнула вперед и мне пришлось фактически с нуля изучать новые технологии и инструменты.
                                </p>
                                <p class="about_me_text_p">В данный момент у меня имеется огромное желание развиваться в этом направлении, применять на практике полученные знания, повышать свои скилы и в будущем постараться внести свой вклад в развитие IT-индустрии.
                                </p>
                            </div>

                        </div>
                      
                        
                    </div>

                </div>

                <!-- конец основоного контента -->

                <!-- боковой сайдбар -->
                <?php include "../includes/sidebar.php" ?>
                <!-- конец бокового сайдбара -->

            </div>
        </div>
    </div>
    </div>

    <!-- FOOTER -->
    <?php include "../includes/footer.php" ?>
    <!-- конец FOOTER -->





</body>

</html>