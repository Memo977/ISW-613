<?php
require_once('utils/functions.php');
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user'])) {
    header('Location: /Workshop4/index.php');
    exit();
}

$id = $_GET['id'] ?? null;
$user = $id ? getUserById($id) : null;
$provinces = getProvinces();

if ($_POST) {
    $updatedUser = [
        'id' => $id,
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'email' => $_POST['email'],
        'province_id' => $_POST['province']
    ];

    if (updateUser($updatedUser)) {
        header("Location: /Workshop4/users.php?success=User updated successfully");
        exit();
    } else {
        $error = "Error updating user";
    }
}
?>

<?php require('inc/header.php') ?>
<div class="container-fluid">
    <div class="jumbotron">
        <h1 class="display-4">Edit User</h1>
        <hr class="my-4">
    </div>
    <?php if (isset($error)) : ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input id="firstName" class="form-control" type="text" name="firstName" value="<?php echo htmlspecialchars($user['name']); ?>" required>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input id="lastName" class="form-control" type="text" name="lastName" value="<?php echo htmlspecialchars($user['lastname']); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input id="email" class="form-control" type="email" name="email" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        </div>
        <div class="form-group">
            <label for="province">Province</label>
            <select id="province" class="form-control" name="province" required>
                <?php foreach ($provinces as $id => $name) : ?>
                    <option value="<?php echo $id; ?>" <?php echo $user['province_id'] == $id ? 'selected' : ''; ?>><?php echo htmlspecialchars($name); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?php require('inc/footer.php'); ?>