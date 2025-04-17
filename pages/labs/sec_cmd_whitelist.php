<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$allowedOptions = ['-l', '-la', '-a']; // Define a whitelist
if (isset($_GET['cmd']) && in_array($_GET['cmd'], $allowedOptions)) {
    $userOption = $_GET['cmd'];
} else {
    // Default option if input is invalid or not provided:
    $userOption = '-l';
}

$command = "ls " . $userOption;
echo "<pre>";
system($command);
echo "</pre>";
?>

