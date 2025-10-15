<?php
// fix_sqli.php - Secure user lookup with Prepared Statements

// Database credentials from DVWA's config
$db_server = '127.0.0.1';
$db_user = 'dvwauser';
$db_password = 'dvwapass';
$db_database = 'dvwa';

// Establish a connection
$conn = new mysqli($db_server, $db_user, $db_password, $db_database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = '';
$first_name = '';
$surname = '';
$error_message = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $user_id = $_GET['id'];

    // 1. Prepare the statement with a placeholder (?)
    $stmt = $conn->prepare("SELECT first_name, last_name FROM users WHERE user_id = ?");

    // 2. Bind the user input to the placeholder
    // 's' means the input is treated as a string
    $stmt->bind_param("s", $user_id);

    // 3. Execute the safe query
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $first_name = $row['first_name'];
        $surname = $row['last_name'];
    } else {
        $error_message = "User not found.";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure User Lookup</title>
</head>
<body>
    <h1>Secure User Lookup (SQLi Fixed)</h1>
    <form method="GET" action="">
        <label for="id">User ID:</label>
        <input type="text" id="id" name="id">
        <input type="submit" value="Lookup">
    </form>

    <?php if ($first_name): ?>
        <h2>Results:</h2>
        <p><strong>First Name:</strong> <?php echo htmlspecialchars($first_name); ?></p>
        <p><strong>Surname:</strong> <?php echo htmlspecialchars($surname); ?></p>
    <?php endif; ?>

    <?php if ($error_message): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
    <?php endif; ?>
</body>
</html>