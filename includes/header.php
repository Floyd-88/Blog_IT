<header>
        <div class="container">
            <div class="header__block-top">
                <div class="header__block-top-left">
                    <h1><?php echo $config['title'] ?></h1>
                </div>

                <div class="header__block-top-right">
                    <div class="header__block-top-right-nav">
                        <a class="header__block-top-link" href="/">Главная</a>
                        <a class="header__block-top-link" href="/pages/about_me.php">Об авторе</a>
                        <a class="header__block-top-link" href="<?php echo $config[vk_url] ?> " target="_blank">Я вконтакте</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__block-bottom">
            <div class="container">
                <nav class="header__block-bottom-nav">

                    <?php 
                    $categories_q = mysqli_query($connection, "SELECT * FROM `articles_categoria`"); //выполняем запрос к базе данных
                    $categories = array(); //создаем массив
                    while($cat = mysqli_fetch_assoc($categories_q) ) //перебираем строки из БД
                    {
                        $categories[] = $cat; //помещаем перебранные строки в массив
                    }
                    ?>

                    <?php
                        foreach( $categories as $cat) //перебераем массив из полученных строк и БД
                        {
                    ?>
                        <!-- вставляем название категории из БД и ссылку-->
                        <a class="header__block-bottom-link" href="/articles.php?categorie=<? echo $cat['id']; ?>"><?php echo $cat['title']; ?></a>  
                    <?php
                        }
                    ?>
                </nav>
            </div>
        </div>
    </header>