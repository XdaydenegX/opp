<?php
session_start();
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
    <header>
        <div class="logo">
            <h1>ХУЙ</h1>
            <span>сосать</span>
        </div>
        <a href="/home">Главная</a>
        <a href="about">О нас</a>
        <a href="application">Мои заявки</a>
        <a href="profile"><?echo $_SESSION['first_name'];?></a>
        <a href="logout">Выйти из аккаунта</a>
    </header>
    <main>

