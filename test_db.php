<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "Before connection<br>";

// Attempt to connect to MySQL using 127.0.0.1 instead of localhost
$conn = mysqli_connect("127.0.0.1", "testuser", "testpassword", "testdb");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "After connection<br>";

mysqli_close($conn);
?>

