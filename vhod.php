<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <?php 
        $website_title = 'Авторизация на сайте';
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
            if(isset($_SESSION['login'])){
                //var_dump($_SESSION['login']);
                $login='Здравствуйте, '.$_SESSION['login'].'!';
            }
            // Проверяем, пусты ли переменные логина и id пользователя
            if (empty($_SESSION['login']))
            // Если пусты, то 
            {
		      echo "<p>Вы вошли на сайт, как гость</p>"; 
              ?>
              <h4>Форма авторизации</h4>
                    <form id="forma" action="/script1.php" method="post">

                        <label for="login">Ваш логин:</label>
                        <input type="text" name="login" id="login" class="form-control" placeholder="Пример: Vasya">

                        <label for="pass">Пароль:</label>
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Пример: qwerty">

                        <div class="alert alert-danger mt-2" id="errorBlock"></div>
                        <input type="submit" class="btn btn-success mt-3" value="Войти">
                    </form>
                    <?php
            }else
                // Если не пусты, то 
            {
                echo "<br><br>Вы вошли на сайт, как ".$_SESSION['login']."<br><br>";
                echo "
                <form action='/close.php'>
                    <input type='submit' class='btn btn-danger' value='Выйти'>
                </form>";
            }
            ?>
            </div>

            <!--Сайдбар-->
            <?php require 'blocks/aside.php' ?>
        </div>
    </main>

    <!--Footer-->
    <?php require 'blocks/footer.php' ?>
    <!--Подключаем Ajax-->

</body>

</html>

