<?php
require_once('../utils/functions.php');

if ($_POST) {
    $user = [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'email' => $_POST['email'],
        'province_id' => $_POST['province'],
        'password' => $_POST['password']
    ];

    if (saveUser($user)) {
        header("Location: /Workshop5/index.php?success=User registered successfully");
        exit();
    } else {
        header("Location: /Workshop5/signup.php?error=Error registering user");
        exit();
    }
}