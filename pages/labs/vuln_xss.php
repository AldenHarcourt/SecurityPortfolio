<?php
// For debugging, enable full error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['input'])) {
    echo "User input: " . $_GET['input'];
} else {
    echo "No input provided. Append ?input=yourdata to the URL.";
}
?>

