<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'testing';

    $connection = mysqli_connect($host, $user, $password, $db) or die ('Нет подключения : ' . mysqli_error());

    if(!$connection){
        die('Ошибка соединения');
    }

?>