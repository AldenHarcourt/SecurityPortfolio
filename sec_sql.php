<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn = mysqli_connect("127.0.0.1", "testuser", "testpassword", "testdb");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prepare the SQL statement. The ? is a placeholder for the variable.
    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE id = ?");
    if ($stmt === false) {
        die("Prepare failed: " . mysqli_error($conn));
    }

    // Bind the input parameter to the prepared statement ("i" indicates an integer parameter)
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute the statement.
    mysqli_stmt_execute($stmt);

    // Get the result set.
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "User: " . htmlspecialchars($row['username']) . "<br>";
        }
    } else {
        echo "Query failed: " . mysqli_error($conn);
    }
    
    // Close the statement.
    mysqli_stmt_close($stmt);
} else {
    echo "No ID provided. Try appending ?id=1 to the URL.";
}

mysqli_close($conn);
?>

