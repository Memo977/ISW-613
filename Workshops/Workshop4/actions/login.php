<?php
require_once('../utils/functions.php');
session_start();

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = authenticate($username, $password);
    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: /Workshop4/users.php');
        exit();
    } else {
        header('Location: /Workshop4/index.php?error=Invalid credentials');
        exit();
    }
}



