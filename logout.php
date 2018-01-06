<?php

session_start();

//remove the current session
session_destroy();

//link to the authorization page
header('Location: login.php');

?>