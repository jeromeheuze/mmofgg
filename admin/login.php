<?php
// admin/login.php
//change password --- php -r "echo password_hash('secret123', PASSWORD_DEFAULT) . PHP_EOL;"
session_start();
require_once '../includes/global.php';
require_once '../bin/dbconnect.php';
$DBcon->set_charset('utf8mb4');

// Redirect if already logged in
if (!empty($_SESSION['is_admin'])) {
    header('Location: games.php');
    exit;
}

$error = '';

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Fetch user from DB
    $stmt = $DBcon->prepare("SELECT id, password_hash FROM admin_users WHERE username = ? LIMIT 1");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->bind_result($userId, $passwordHash);
    if ($stmt->fetch() && password_verify($password, $passwordHash)) {
        // Successful login
        $_SESSION['is_admin'] = true;
        $_SESSION['admin_user_id'] = $userId;
        $stmt->close();
        header('Location: games.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./_includes/admin_head.php" ?>
    <title>Admin Login</title>
</head>
<body>
<div class="container my-5">
<div class="login-container">
    <h1>Admin Login</h1>
    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post" class="mt-3">
        <div class="mb-3">
            <label for="username" class="form-label">Username:<br>
                <input id="username" class="form-control" type="text" name="username" required>
            </label>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Password:<br>
                <input id="password" class="form-control" type="password" name="password" required>
            </label>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Login</button>
        </div>
    </form>
</div>
</div>
<?php include "./_includes/admin_footer.php" ?>
</body>
</html>
