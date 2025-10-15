<?php
// fix_csrf_form.php - A form protected with an Anti-CSRF token

session_start();

// Generate a token and store it in the session
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['csrf_token'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Password Change</title>
</head>
<body>
    <h1>Change Your Password (CSRF Protected)</h1>
    <form method="POST" action="fix_csrf_process.php">
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password_new">
        <br><br>
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($token); ?>">
        <input type="submit" value="Change Password">
    </form>
</body>
</html>