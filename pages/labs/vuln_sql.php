<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to the database using our dedicated test user
$conn = mysqli_connect("127.0.0.1", "testuser", "testpassword", "testdb");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Intentional vulnerability: no sanitization applied
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "User: " . htmlspecialchars($row['username']) . "<br>";
        }
    } else {
        // Output the MySQL error for debugging
        echo "Query failed: " . mysqli_error($conn);
    }
} else {
    echo "No ID provided. Try appending ?id=1 to the URL.";
}

mysqli_close($conn);
?>

