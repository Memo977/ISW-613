<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "workshop2";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$name = $_POST['name'] ?? '';
$lastName = $_POST['lastname'] ?? '';
$phone = $_POST['phone'] ?? '';
$email = $_POST['email'] ?? '';


$sql = "INSERT INTO usuarios (name, lastname, phone, email) VALUES (?, ?, ?, ?)";


$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $lastName, $phone, $email);


if ($stmt->execute()) {
    echo "Nuevo registro creado con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();

header("Location: /Workshop2/index.php");
exit();
?>