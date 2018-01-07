<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AppTasker</title>
    <link rel="stylesheet" href="../css/layout.css" type="text/css">
    <link rel="stylesheet" href="../css/main.css" type="text/css">
    <link rel="stylesheet" href="../css/items.css" type="text/css">
    <link rel="stylesheet" href="../css/zebra_pagination.css" type="text/css">
    <script src="js/script.js"></script>
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-1 logo">
                <a href="index.php"><img src="img/logo.ico" alt="Logotype"></a>
            </div>
            <div class="col-lg-offset-7 col-lg-4 menu">
                <ul>
                    <li>
                        <? if (isset($_SESSION['username'])) { ?>
                            <a href="logout.php">Вийти</a>
                        <?} else {?>
                            <a href="login.php">Авторизація</a>
                        <?}?>
                    </li>
                    <li><a href="create.php">Створити завдання</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
