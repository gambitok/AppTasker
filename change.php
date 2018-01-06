<?php

require('connect.php');

$id_task = $_REQUEST['id_task'];

$name = $_REQUEST['name'];

$email = $_REQUEST['email'];

$text = $_REQUEST['text'];

if(!empty($_REQUEST['status']))
    $status = 1;
else
    $status = 0;

mysqli_query($connection, "UPDATE tasks SET name='$name', email='$email', text='$text', status='$status' WHERE id_task='$id_task'");

mysqli_close($connection);

header('Location: '.'index.php');

?>


