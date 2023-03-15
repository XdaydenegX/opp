<?php
include 'db.php';
include 'temp/header.php';

if (isset($_SESSION['login'])) {
    $userid = $_SESSION['userid'];
    $lastname = $_SESSION['last_name'];    
    $sql = "SELECT * FROM `credit_user` as cu, `users` as u, `credit` as c WHERE c.id = cu.credit_id AND u.id = cu.user_id AND u.last_name = '$lastname' AND u.id = '$userid'";
    $result = mysqli_query($link, $sql);
    $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
else {
    header("Location: login");
    die();
}
?>
<h1>Если вашей заявки еще здесь нет, то она находиться в стадии проверки, мы вам перезвоним!</h1>
<?foreach ($arr as $j):?>
    <div class="banner" id="about">
        <h1><?echo $j['last_name']?></h1>
        <p><?echo $j['first_name']?></p>
        <p><?echo $j['last_last_name']?></p>
        <h3><?echo $j['target']?></h3>
        <p><?echo $j['price']?></p>
        <?if ($j['sratus'] == 1):?>
            <h1>Кредит одобрен</h1>
        <?else:?>
            <h1>На рассмотрении администратором</h1>
        <?endif;?>
    </div>
<?endforeach;?>
<?php
include 'temp/footer.php';
?>