<?php
// fix_csrf_process.php - Validates the Anti-CSRF token

session_start();

$message = '';
$color = 'red';

// Check if the submitted token matches the one in the session
if (isset($_POST['csrf_token'], $_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    $message = "Password Changed Successfully! (Valid Token)";
    $color = 'green';
} else {
    $message = "Invalid CSRF Token! Request Blocked.";
    $color = 'red';
}

// Unset the token so it can't be used again
unset($_SESSION['csrf_token']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Processing Request</title>
</head>
<body>
    <h1 style="color: <?php echo $color; ?>;"><?php echo htmlspecialchars($message); ?></h1>
    <a href="fix_csrf_form.php">Go back to form</a>
</body>
</html>


