<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <?php 
        $website_title = 'Регистрация';
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
                <h4>Форма регистрации</h4>
                <form action="" method="post">

                    <label for="username">Ваше имя:</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Пример: Вася">

                    <label for="email">Ваш email:</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Пример: test@mail.ru">

                    <label for="login">Ваш логин:</label>
                    <input type="text" name="login" id="login" class="form-control" placeholder="Пример: Vasya">

                    <label for="pass">Пароль:</label>
                    <input type="password" name="pass" id="pass" class="form-control" placeholder="Пример: qwerty">

                    <div class="alert alert-danger mt-2" id="errorBlock"></div>
                    <button type="button" id="reg_user" class="btn btn-success mt-3">Зарегистрироваться</button>
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
        $('#reg_user').click(function() {
            /*alert('sdf');*/
            /*Получение данных с формы*/
            var name = $('#username').val();
            var email = $('#email').val();
            var login = $('#login').val();
            var pass = $('#pass').val();

            $.ajax({
                url: 'ajax/registration.php',
                /*файл*/
                type: 'POST',
                /*передача данных*/
                cache: false,
                /*кеширование файлов откл*/
                data: {
                    'username': name,
                    'email': email,
                    'login': login,
                    'pass': pass
                },
                /*передаем параметры из формы*/
                dataType: 'html',
                /*способ получения данных*/
                success: function(data) {
                    if (data == 'Готово') {
                        $('#reg_user').text('Все готово');
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
