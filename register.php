<?php
include 'db.php';
session_start();

if (isset($_POST['login']) && isset($_POST['password'])) {
    $password = md5($_POST['password']);
    $sql = "INSERT INTO users
    (last_name, first_name, last_last_name, login, password, passport_number, passport_series, phone)
    VALUES
    ('{$_POST['last_name']}', '{$_POST['first_name']}', '{$_POST['last_last_name']}', '{$_POST['login']}', '{$password}', 
    '{$_POST['passport_number']}', '{$_POST['passport_series']}', '{$_POST['phone']}')";
    $result = mysqli_query($link, $sql);
    header("Location: login");
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
    
</body>
</html>
<form method="post" class="register-form">
    <input type="text" name="last_name" placeholder="Фамилия">
    <input type="text" name="first_name" placeholder="Имя">
    <input type="text" name="last_last_name" placeholder="Отчество">
    <input type="text" name="login" placeholder="Ваш логин">
    <input type="password" name="password" placeholder="Ваш пароль">
    <input type="text" name="passport_number" placeholder="Серия паспорта">
    <input type="text" name="passport_series" placeholder="Номер паспорта"> 
    <input type="text" name="phone" placeholder="Телефон">
    <button type="submit">Регитсрация</button>
    <p>Уже есть аккаунт? <a href="login">Войти в аккаунт</a></p>
</form>

<?php
include 'temp/footer.php';
?>