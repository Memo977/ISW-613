<?php

/**
 *  Gets the provinces from the database
 */
function getProvinces() {
  $conn = getConnection();
  $result = mysqli_query($conn, "SELECT id, name FROM provinces ORDER BY name");
  $provinces = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $provinces[$row['id']] = $row['name'];
  }
  return $provinces;
}

function getConnection() {
  $connection = mysqli_connect("localhost", "root", "", "Workshop3");
  return $connection;
}

/**
 * Saves an specific user into the database
 */
function saveUser($user){

  $firstName = $user['firstName'];
  $lastName = $user['lastName'];
  $username = $user['email'];
  $provinceId = $user['province_id'];
  $password = $user['password'];

  $sql = "INSERT INTO users (name, lastname, username, province_id, password) 
            VALUES('$firstName', '$lastName', '$username', $provinceId, '$password')";

  $conn = getConnection() ;
  mysqli_query($conn, $sql);
  return true;
}