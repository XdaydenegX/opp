<?php
include 'db.php';
session_start();
error_reporting(0);
if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE `login` = '$login' AND `password` = '$password'";
    $result = mysqli_query($link, $sql);
    $arr = mysqli_fetch_assoc($result);
    if ($arr['login'] == $login && $arr['password'] == $password) {
        $_SESSION['userid'] = $arr['id'];
        $_SESSION['last_name'] = $arr['last_name'];
        $_SESSION['first_name'] = $arr['first_name'];
        $_SESSION['last_last_name'] = $arr['last_last_name'];
        $_SESSION['phone'] = $arr['phone'];
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        $_SESSION['passport_number'] = $arr['passport_number'];
        $_SESSION['passport_series'] = $arr['passport_series'];
        header("Location: home");

    }
    else {
        echo "<h1>Введенны неверные данные</h1>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/index.css?<?time();?>">
    <title><?echo $_SESSION['title'];?></title>
</head>
<body>
    <main>

<form method="post">
    <input type="text" name="login" placeholder="Ваш логин">
    <input type="password" name="password" placeholder="Ваш пароль">
    <button type="submit">Войти</button>
    <p>У вас нет аккаунта?<a href="register">Зарегистрируйтесь</a></p>
</form>

<?php
include 'temp/footer.php';
?>