<?php
require_once('utils/functions.php');

if ($argc != 2) {
    echo "Usage: php validateActiveSessions.php <hours>\n";
    exit(1);
}

$hours = intval($argv[1]);

if ($hours <= 0) {
    echo "Hours must be a positive integer.\n";
    exit(1);
}

$conn = getConnection();

$sql = "UPDATE users 
        SET status = 'inactive' 
        WHERE status = 'active' 
        AND TIMESTAMPDIFF(HOUR, last_login_datetime, NOW()) > $hours";

$result = $conn->query($sql);

if ($result) {
    $affectedRows = $conn->affected_rows;
    echo "Updated $affectedRows users to inactive status.\n";
} else {
    echo "Error updating users: " . $conn->error . "\n";
}

$conn->close();