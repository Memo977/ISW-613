<?php
require_once('utils/functions.php');
session_start();

// Verify if the user is authenticated
if (!isset($_SESSION['user'])) {
    header('Location: /Workshop5/index.php');
    exit();
}

$users = getAllUsers();
$loggedInUserId = $_SESSION['user']['id'];
?>

<?php require('inc/header.php') ?>
<div class="container-fluid">
    <div class="jumbotron">
        <h1 class="display-4">Users</h1>
        <p class="lead">List of users</p>
        <hr class="my-4">
    </div>
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
    <?php endif; ?>
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($_GET['success']); ?></div>
    <?php endif; ?>
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Province</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                    <td><?php echo htmlspecialchars($user['lastname']); ?></td>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['province_name']); ?></td>
                    <td>
                        <a href="/Workshop5/edit_user.php?id=<?php echo $user['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                        <?php if ($user['id'] != $loggedInUserId): ?>
                            <a href="/Workshop5/delete_user.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require('inc/footer.php'); ?>