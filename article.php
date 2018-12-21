<?php 
    session_start();
?>



<!DOCTYPE html>
<html lang="ru">

<head>
    <?php 
        $website_title = 'Добавление статьи';
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
                <h4>Добавление статьи</h4>
                <form action="" method="post">

                    <label for="title">Заголовок статьи</label>
                    <input type="text" name="title" id="title" class="form-control">
                    
                    <label for="intro">Интро статьи</label>
                    <textarea name="intro" id="intro" class="form-control"></textarea>
                    
                    <label for="text">Текст статьи</label>
                    <textarea name="text" id="text" class="form-control"></textarea>

                    <div class="alert alert-danger mt-2" id="errorBlock"></div>
                    <button type="button" id="article_send" class="btn btn-success mt-3">Добавить</button>
                </form>
            </div>
            <!--Сайдбар-->
            <?php require 'blocks/aside.php' ?>
        </div>
    </main>

    <!--Footer-->
    <?php require 'blocks/footer.php' ?>
    <!--Подключаем Ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $('#article_send').click(function() {
            /*alert('sdf');*/
            /*Получение данных с формы*/
            var title = $('#title').val();
            var intro = $('#intro').val();
            var text = $('#text').val();

            $.ajax({
                url: 'ajax/add_article.php',
                /*файл*/
                type: 'POST',
                /*передача данных*/
                cache: false,
                /*кеширование файлов откл*/
                data: {
                    'title': title,
                    'intro': intro,
                    'text': text
                },
                /*передаем параметры из формы*/
                dataType: 'html',
                /*способ получения данных*/
                success: function(data) {
                    if (data == 'Готово') {
                        $('#article_send').text('Все готово');
                        $('#errorBlock').hide(); /*прячем ошибку*/
                    } else {
                        $('#errorBlock').show(); /*показываем ошибку*/
                        $('#errorBlock').text(data);
                    }
                }
            });
        });

    </script>
</body>

</html>
