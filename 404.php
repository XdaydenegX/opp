<?php
session_start();
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
    <main>
        <center>
            <h1>#404<br>PAGE NOT FOUND<br>:(</h1>
        </center>
    </main>
</body>
</html>