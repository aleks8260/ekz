<?php
session_start();
/*Подключение к БД*/
require_once 'db.php';
header('Refresh: 5; URL=http://ekzamen/vhod.php'); //redirect с задержкой
echo 'Вы будете перенаправлены на страницу авторизации через 5 секунд.'; //вывод сообщения

if (isset($_POST['login'])) { 
    $login = $_POST['login']; 
    if ($login == '') { 
        unset($login);
    } 
}
if (isset($_POST['pass'])) {
    $pass=$_POST['pass']; 
    if ($pass == '') {
        unset($pass);
    } 
}
//var_dump($pass);
//die();
if (empty($login) or empty($pass)){
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
    
$login = stripslashes($login);
$login = htmlspecialchars($login);
$login = trim($login);
//var_dump($login);
$pass = stripslashes($pass);
$pass = htmlspecialchars($pass);
$pass = trim($pass);

$result = mysqli_query($connection, "SELECT * FROM users WHERE login = '{$login}' OR pass ='{$pass}'");

$myrow = mysqli_fetch_assoc($result);
if($myrow['login'] && $myrow['pass']){
    var_dump($myrow);
    $_SESSION['login']=$myrow['login'];
    echo "
        <br/><br/>Поздравляем! Вы успешно вошли на сайт $login! <br /><a href='/'>Главная страница</a><br /><a href='/reg.php'>Регистрация</a>
        ";
}else{
    exit ("<br /><br />Извините, введённый вами login или пароль неверный!");
}

?>
