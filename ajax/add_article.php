<?php
    session_start();
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
    $text = trim(filter_var($_POST['text'], FILTER_SANITIZE_STRING));

    $error = '';
    if(strlen($title) <= 3)
        $error = 'Введите название статьи';
    else if(strlen($intro) <= 15)
        $error = 'Введите интро для статьи';
    else if(strlen($text) <= 20)
        $error = 'Введите текст статьи';

    if($error != ''){
        echo $error;
        exit();
    }

    /*Подключение к БД*/
    require_once '../db.php';

    /*Записываем статью в БД*/
    //НЕ РАБОТАЕТ дата и автор (вставил заглушки, вместо 1 ставил time(), вместо "Заглушка" ставил $_SESSION['login'],
    //чтоб подтягивался авторизованный пользователь (но не работает)
    $query = "INSERT INTO articles(title, intro, text, date, avtor) VALUES ('$title', '$intro', '$text', 1, 'Заглушка')";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('Ошибка запроса' . mysqli_error());
    }

    echo 'Готово';

?>