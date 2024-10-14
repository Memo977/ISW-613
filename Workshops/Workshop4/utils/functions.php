<?php

/**
 * Obtiene la conexión a la base de datos
 */
function getConnection(): mysqli {
    $connection = mysqli_connect("localhost", "root", "", "Workshop4");
    if (!$connection) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    return $connection;
}

/**
 * Obtiene las provincias desde la base de datos
 */
function getProvinces(): array {
    $conn = getConnection();
    $sql = "SELECT id, name FROM provinces";
    $result = $conn->query($sql);
    $provinces = [];
    while ($row = $result->fetch_assoc()) {
        $provinces[$row['id']] = $row['name'];
    }
    $conn->close();
    return $provinces;
}

/**
 * Guarda un usuario en la base de datos
 */
function saveUser($user): bool {
    $conn = getConnection();
    $firstName = $conn->real_escape_string($user['firstName']);
    $lastName = $conn->real_escape_string($user['lastName']);
    $email = $conn->real_escape_string($user['email']);
    $password = $conn->real_escape_string($user['password']); // Sin hash, como en el original
    $provinceId = (int)$user['province_id'];

    $sql = "INSERT INTO users (name, lastname, username, password, province_id) VALUES ('$firstName', '$lastName', '$email', '$password', $provinceId)";

    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

/**
 * Autentica a un usuario
 */
function authenticate($username, $password): ?array {
    $conn = getConnection();
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password); // Sin hash, como en el original
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $conn->close();
        return $user;
    }
    $conn->close();
    return null;
}

/**
 * Obtiene todos los usuarios
 */
function getAllUsers(): array {
    $conn = getConnection();
    $sql = "SELECT u.*, p.name as province_name FROM users u LEFT JOIN provinces p ON u.province_id = p.id";
    $result = $conn->query($sql);
    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    $conn->close();
    return $users;
}

/**
 * Obtiene un usuario por su ID
 */
function getUserById($id): ?array {
    $conn = getConnection();
    $id = (int)$id;
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
    $conn->close();
    return $user ?: null;
}

/**
 * Actualiza un usuario
 */
function updateUser($user): bool {
    $conn = getConnection();
    $id = (int)$user['id'];
    $firstName = $conn->real_escape_string($user['firstName']);
    $lastName = $conn->real_escape_string($user['lastName']);
    $email = $conn->real_escape_string($user['email']);
    $provinceId = (int)$user['province_id'];

    $sql = "UPDATE users SET name = '$firstName', lastname = '$lastName', username = '$email', province_id = $provinceId WHERE id = $id";

    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

/**
 * Elimina un usuario si no es el usuario actualmente logueado
 */
function deleteUser($id, $loggedInUserId): bool {
    if ($id == $loggedInUserId) {
        return false;
    }
    
    $conn = getConnection();
    $id = (int)$id;
    $sql = "DELETE FROM users WHERE id = $id";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}