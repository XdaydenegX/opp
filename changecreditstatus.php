<?php
include 'db.php';
$id = $_POST['id'];
$sql = "UPDATE credit SET sratus = 1 WHERE `id` =  $id";
mysqli_query($link, $sql);
$sql = "SELECT * FROM `credit_user` as cu, `users` as u, `credit` as c WHERE c.id = cu.credit_id AND cu.user_id = u.id and c.sratus = 0";
$result = mysqli_query($link, $sql);
$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($arr);
?>