<?php
session_start();

require('connect.php');

if (isset($_SESSION['username'])) header('Location: '.'index.php');

if (isset($_POST['username']) and isset($_POST['password'])){

    $username = $_POST['username'];

    $password = $_POST['password'];

    $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    $count = mysqli_num_rows($result);

    if ($count == 1){
        $_SESSION['username'] = $username;
    }
    else{
        ?>
        <script>
            alert('Не вірно введені дані!');
        </script>
        <?
   }
}
if (isset($_SESSION['username'])){

    $username = $_SESSION['username'];

    header('Location: '.'index.php');

}

include('html/header.php');

?>
<main>
    <div class="container">
        <div class="row loginu">
            <div class="col-lg-6">
                <form method="POST">
                    <h2>Авторизація</h2>
                    <ul>
                        <li><label>Введіть логін:</label></li>
                        <li><input type="text" name="username" placeholder="Login"><br><br></li>
                        <li><label>Введіть пароль:</label></li>
                        <li><input type="password" name="password" placeholder="Password"></li>
                        <li><button type="submit">Увійти</button></li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</main>
<?
include('html/footer.php');
?>

