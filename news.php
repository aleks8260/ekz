<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
        require_once 'db.php';
        $id=$_GET['id'];
        $result = mysqli_query($connection, "SELECT * FROM articles WHERE id = '$id'");
        if(!$result) {
            die('Ошибка запроса' . mysqli_error());
        }
        $article = mysqli_fetch_assoc($result);
        $website_title = $article['title'];
        require 'blocks/head.php';
    ?>
</head>

<body>
    <!--Header-->
    <?php require 'blocks/header.php' ?>

    <main class="container mt-5">
        <div class="row">
            <!--Статьи-->
            <div class="col-md-8 mb-3">
                <div class="jumbotron">
                    <h1><?=$article['title']?></h1>
                    <p><b>Автор:</b><mark><?=$article['avtor']?></mark></p>
                    <?php

                        $date = date('d ', $article['date']);
                        $array =["Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря"];
                        $date .= $array[date('n ', $article['date']) - 1];
                        $date .= date('H:i ', $article['date']);
                    ?>
                    <p><b>Дата публикации: </b><u><?=$date?></u></p>
                    <p>
                        <?=$article['intro']?>
                        <br>
                        <?=$article['text']?>
                    </p>
                </div>
                
                <h3 class="mt-5">Комментарии</h3>
                    <form action="/news.php?id=<?=$_GET['id']?>" method="post">

                    <label for="username">Ваше имя:</label>
                    <input type="text" name="username" id="username" value="<?=$_COOKIE['log']?>" class="form-control">

                    <label for="mess">Сообщение:</label>
                    <textarea name="mess" id="mess" class="form-control"></textarea>
                    
                    <button type="submit" id="mess_send" class="btn btn-success mt-3 mb-5">Добавить комментарий</button>
                </form>
                <?php
                    if($_POST['username'] != '' && $_POST['mess'] != ''){
                        $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
                        $mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));

                        /*Записываем коммент в БД*/
                        $query = "INSERT INTO comments(name, mess, article_id) VALUES ('$username', '$mess', '$id')";
                        $result = mysqli_query($connection, $query);
                        if(!$result) {
                            die('Ошибка запроса' . mysqli_error());
                        }
                    }
                ?>
                <?php
                /*Достаем все комментарии к данной статье*/
                $result = mysqli_query($connection, "SELECT * FROM comments WHERE article_id = '$id' ORDER BY id DESC");
                while($comments = mysqli_fetch_assoc($result)){?>
                    <div class='alert alert-info mb-2'>
                    <?php print ('<h4>' . $comments['name'].'</h4>'); ?>
                    <?php print ('<p>' . $comments['mess'].'</p>'); ?>
                    </div>
                <?php } ?>

            </div>
            
            <!--Сайдбар-->
            <?php require 'blocks/aside.php' ?>
        </div>
    </main>

    <!--Footer-->
    <?php require 'blocks/footer.php' ?>
</body>

</html>
