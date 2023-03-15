<?php
session_start();
include 'db.php';

if (isset($_POST['adminlogin']) && isset($_POST['adminpassword'])) {
    $login = $_POST['adminlogin'];
    $password = md5($_POST['adminpassword']);
    $sql = "SELECT * FROM `admin` WHERE `adminlogin` = '$login' AND `adminpassword` = '$password'";
    $result = mysqli_query($link, $sql);
    $arr = mysqli_fetch_assoc($result);
    if ($arr['adminlogin'] == $login && $arr['adminpassword'] == $password) {
        $_SESSION['adminlogin'] = $login;
        $_SESSION['adminpassword'] = $password;
        header("Location: admin");
    }
    else {
        header("Location: home");
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?echo $_SESSION['title'];?></title>
</head>
<body>
    <form method="post">
        <input type="text" name="adminlogin" placeholder="Ваш логин">
        <input type="password" name="adminpassword" placeholder="Ваш пароль">
        <button type="submit">Войти в админ панель</button>
    </form>
</body>
</html>