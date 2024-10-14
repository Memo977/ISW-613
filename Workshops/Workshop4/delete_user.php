<?php
require_once('../utils/functions.php');
session_start();

// Verify if the user is authenticated
if (!isset($_SESSION['user'])) {
    header('Location: /Workshop4/index.php');
    exit();
}

$id = $_GET['id'] ?? null;
$loggedInUserId = $_SESSION['user']['id'];

if ($id) {
    if ($id == $loggedInUserId) {
        header("Location: /Workshop4/users.php?error=You cannot delete your own account");
    } elseif (deleteUser($id, $loggedInUserId)) {
        header("Location: /Workshop4/users.php?success=User deleted successfully");
    } else {
        header("Location: /Workshop4/users.php?error=Error deleting user");
    }
} else {
    header("Location: /Workshop4/users.php?error=Invalid user ID");
}
exit();