<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['cmd'])) {
    // Use escapeshellcmd to sanitize the whole command string.
    $userInput = escapeshellcmd($_GET['cmd']);
} else {
    $userInput = '-l';
}

$command = "ls " . $userInput;
echo "<pre>";
system($command);
echo "</pre>";
?>

