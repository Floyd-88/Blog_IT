<?php

// require_once "config.php" //подключаем файл с шаблоном(если будет ошибка скрипт остановится, в отличает от include)

$connection = mysqli_connect( //подключаемся к серверу, вводим(название сервера, логин, пароль, имя базы данных )
    $config['db']['server'], 
    $config['db']['username'],
    $config['db']['password'],
    $config['db']['name']
);

// Проверяем, если подключиться не удалось выодим ошибку и останавливаем выполнение скрипта
if($connection == false) {
    echo "Не удалось подключиться к базе данных! <br>";
    echo mysqli_connect_eror();
    exit();
};


?>