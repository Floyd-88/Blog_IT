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
                                <h3>Правообладателям</h3>
                            </div>
                        </div>
                       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, consectetur molestiae. Eius libero qui ex sunt voluptatibus esse voluptate quidem aliquid quisquam quia! Vitae ratione, sunt unde tempora veritatis nostrum magnam. Magnam vitae non eum deleniti debitis minima ipsum blanditiis vero molestiae quo quos reprehenderit sapiente sunt unde praesentium sed accusantium explicabo dolor quam officiis quasi, commodi fugiat illum? Architecto, unde recusandae, veniam accusamus vero ullam dignissimos quae nemo deleniti ipsum molestias ab maxime possimus, repellendus totam error similique magnam blanditiis sapiente mollitia quas voluptate! Cupiditate commodi, asperiores animi odio quasi ab similique accusamus ipsa nulla quam cum, quas hic eaque? Iste iusto eius maiores, alias pariatur, provident soluta eos, consectetur dignissimos libero consequuntur impedit ipsa optio? Quas libero nihil tempora suscipit molestias doloribus porro amet iste quae! Sunt omnis cum nisi commodi, tempora dolores consectetur, adipisci facere neque nobis ipsum explicabo quam veniam, deleniti cumque eum optio facilis praesentium!</p>
                       
                        
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