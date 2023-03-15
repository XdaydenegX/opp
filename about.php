<?php
include 'db.php';
include 'temp/header.php';
if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
    $sql = "SELECT * FROM sections";
    $result = mysqli_query($link, $sql);
    $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
else {
    header("Location: login");
    die();
}
?>

<h1>НАШИ УСЛУГИ</h1>
<?foreach ($arr as $i):?>
<div class="banner" id="about">
    <h1><?echo $i['title'];?></h1>
    <p><?echo $i['desx'];?></p>
    <h3>Обращайтесь в нас банк</h3>
</div>
<?endforeach;?>


<form method="post" class="credit-form" required>
    <h1>Оформить заявку на кредит</h1>
    <input type="text" name="last_name" placeholder="Фамилия" required>
    <input type="text" name="first_name" placeholder="Имя" required>
    <input type="text" name="last_last_name" placeholder="Отчество" required>
    <input type="text" name="passport_number" placeholder="Серия паспорта" required>
    <input type="text" name="passport_series" placeholder="Номер паспорта" required> 
    <input type="text" name="phone" placeholder="Телефон" required>
    <input type="text" name="target" placeholder="Цель кредита" required>
    <input type="text" name="price" placeholder="Сумма" required>
    <button type="submit">Отправить заявку</button>
</form>

<?php
if (isset($_POST['target'])) {
    $sql2 = "INSERT INTO credit (target, price) VALUES ('{$_POST['target']}', '{$_POST['price']}')";
    $result = mysqli_query($link, $sql2);
    if ($_POST['last_name'] == $_SESSION['last_name']) 
    {
        $_SESSION['creditid'] = $credit['id'];
        $_SESSION['target'] = $_POST['target'];
        $_SESSION['price'] = $_POST['price'];
        header("Location: application");
    }
    else {
        echo 'неверно введены данные';
    }
}




include 'temp/footer.php';
?>