<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <?php 
        $website_title = 'PHP экзамен';
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

                <?php
                    require_once 'db.php';
                    $query = "SELECT * FROM articles ORDER BY date DESC";
                    $result = mysqli_query($connection, $query);
                    if(!$result) {
                        die('Ошибка запроса' . mysqli_error());
                    }
                    while($row = mysqli_fetch_assoc($result)){?>
                        <?php print ('<h2>' . $row['title'].'</h2>'); ?>
                        <?php print ('<p>' . $row['intro'].'</p>'); ?>
                        <?php print ('<p><b>Автор:</b><mark>' . $row['avtor'].'</mark></p>'); ?>
                        <?php print ("<a href=/news.php?id=". $row['id']. " <button class='btn btn-warning mb-5'>Подробнее...</button></a>"); ?>
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
