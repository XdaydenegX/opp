<?php
include 'db.php';
include 'temp/header.php';
if (isset($_SESSION['login'])) {
    $id = $_SESSION['userid'];
    $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
    $result = mysqli_query($link, $sql);
    $arr = mysqli_fetch_assoc($result); 
}
else {
    header("Location: login");
    die();
}

?>

<div class="banner" id="about">
    <h1><?echo $arr['last_name'];?></h1>
    <p><?echo $arr['first_name'];?></p>
    <p><?echo $arr['last_last_name'];?></p>
    <div class="ops">
        <p><?echo $arr['phone'];?></p>
    </div>
</div>

<?php
include 'temp/footer.php';
?>