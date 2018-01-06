<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AppTasker</title>
    <link rel="stylesheet" href="../css/layout.css" type="text/css">
    <link rel="stylesheet" href="../css/ss.css" type="text/css">
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
            <div class="col-lg-offset-7 col-lg-2 create">
                <a href="create.php">Create task</a>
            </div>
            <div class="col-lg-2 login">
                <? if (isset($_SESSION['username'])) { ?>
                    <a href="logout.php">Logout</a>
                <?} else {?>
                    <a href="login.php">Log in</a>
                <?}?>
            </div>
        </div>
    </div>
</header>
