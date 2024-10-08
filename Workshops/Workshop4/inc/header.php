<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Web Application</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" id="navId">
    <?php if (!$user): ?>
      <li class="nav-item">
        <a href="/Workshop4/signup.php" class="nav-link">Signup</a>
      </li>
      <li class="nav-item">
        <a href="/Workshop4/index.php" class="nav-link">Login</a>
      </li>
    <?php else: ?>
      <li class="nav-item">
        <a href="/Workshop4/users.php" class="nav-link">Users</a>
      </li>
      <li class="nav-item">
        <a href="/Workshop4/actions/logout.php" class="nav-link">Logout</a>
      </li>
      <li class="nav-item">
        <span class="nav-link">Hi <?php echo htmlspecialchars($user['name']); ?></span>
      </li>
    <?php endif; ?>
  </ul>