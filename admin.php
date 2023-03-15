<?php

session_start();
include 'db.php';
if (!isset($_SESSION['adminlogin']) && !isset($_SESSION['adminpassword'])) {
    header("Location: home");
    die();
}
else {
    $sql = "SELECT cu.credit_id as id_credit, cu.user_id as id_user, u.first_name, u.last_name, u.last_last_name, u.id, c.target, c.price, c.sratus FROM `credit_user` as cu join `users` as u join `credit` as c WHERE c.id = cu.credit_id AND cu.user_id = u.id and c.sratus = 0;";
    $result = mysqli_query($link, $sql);
    $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/index.css?<?time();?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title><?echo $_SESSION['title'];?></title>
</head>
<body>
    <main>
        <h1>admin page</h1>
        <?foreach ($arr as $c):?>
            <div class="banner" id="about">
                <h1><?echo $c['last_name']?></h1>
                <p><?echo $c['first_name']?></p>
                <p><?echo $c['last_last_name']?></p>
                <h3><?echo $c['target']?></h3>
                <p><?echo $c['price']?></p>
                <button type="submit" id="ChangeCreditBtn" onclick="ChangeCreditStatus(<?echo $c['id_credit'];?>)">Одобрить кредит</button>
            </div>
        <?endforeach;?>
    </main>
</body>
<script src="static/index.js"></script>
</html>


<?php
include 'temp/footer.php';
?>