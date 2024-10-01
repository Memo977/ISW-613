<?php
require('utils/functions.php');

$conn = getConnection();
$sql = "SELECT u.id, u.name, u.lastname, u.username, p.name as province 
        FROM users u 
        JOIN provinces p ON u.province_id = p.id 
        ORDER BY u.id";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="jumbotron">
            <h1 class="display-4">User List</h1>
            <p class="lead">All registered users</p>
            <hr class="my-4">
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Province</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']); ?></td>
                    <td><?php echo $row['name']); ?></td>
                    <td><?php echo $row['lastname']); ?></td>
                    <td><?php echo $row['username']); ?></td>
                    <td><?php echo $row['province']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-primary">Back to Sign Up</a>
    </div>
</body>
</html>