<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Secure XSS Example</title>
</head>
<body>
  <?php
  if (isset($_GET['input'])) {
    // Secure: Convert special characters to HTML entities
    echo htmlspecialchars($_GET['input'], ENT_QUOTES, 'UTF-8');
  } else {
    echo "No input provided.";
  }
  ?>
</body>
</html>

