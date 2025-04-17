<?php
// Enable full error reporting (for lab debugging)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*
  Vulnerable Command Injection Example:
  This script executes a system command by appending user-supplied input.
  It uses the GET parameter "cmd" and passes it to the "ls" command.
  WARNING: This is insecure and for educational purposes only!
*/

if (isset($_GET['cmd'])) {
    // Capture the command parameter from URL
    $userInput = $_GET['cmd'];
    
    // Vulnerable command: appending unsanitized input directly into the command.
    // For demonstration, we're using the "ls" command.
    // An attacker could inject additional commands here.
    $command = "ls " . $userInput;

    // Execute the command and output the result
    echo "<pre>";
    system($command);
    echo "</pre>";
} else {
    echo "No command provided. Try appending ?cmd=-l to the URL to list files.";
}
?>

