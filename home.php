<?php
include 'db.php';
include 'temp/header.php';
if (!isset($_SESSION['login'])) {
    header("location: login");
}

?>
<div class="pp">
    <h1>ПОЛЬЗУЙТЕСЬ НАШЕЙ ШТУКОЙ</h1>
    <p>пожалуйста пользуйтесь нашей штукой пожалуйста пользуйтесь нашей штукой пожалуйста пользуйтесь нашей штукой пожалуйста пользуйтесь нашей штукой пожалуйста пользуйтесь нашей штукой</p>
</div>
<div class="banner">
    <img src="static/image/1.jpg" alt="img1altsource">
    <div class="banner-container">
        <h1>TEST NEWS</h1>
        <p>test news about culture things!</p>
    </div>
</div>


<?php
include 'temp/footer.php';
?>