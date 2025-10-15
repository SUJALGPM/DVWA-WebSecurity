<?php
// fix_xss.php - Secure output encoding to prevent Reflected XSS

$name = '';
if (isset($_GET['name'])) {
    $name = $_GET['name'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Hello Page</title>
</head>
<body>
    <h1>Secure Hello Page (XSS Fixed)</h1>
    <form method="GET" action="">
        <label for="name">What's your name?</label>
        <input type="text" id="name" name="name">
        <input type="submit" value="Submit">
    </form>

    <?php if ($name !== ''): ?>
        <h2>
            <?php
            // Use htmlspecialchars() to encode output.
            // This converts < into &lt; and > into &gt;
            echo "Hello " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
            ?>
        </h2>
    <?php endif; ?>
</body>
</html>