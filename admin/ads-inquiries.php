<?php
// admin/ads-inquiries.php
session_start();
require_once '../includes/global.php';
require_once '../bin/dbconnect.php';
require_once 'csrf.php';
$DBcon->set_charset('utf8mb4');

// Auth check
if (empty($_SESSION['is_admin'])) {
    header('Location: login.php');
    exit;
}

// Handle POST actions (update status, delete inquiry)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf_token($_POST['csrf_token'] ?? null)) {
        die('Invalid CSRF token.');
    }
    $action = $_POST['action'] ?? '';
    $id     = (int)($_POST['id'] ?? 0);
    if ($id > 0) {
        if ($action === 'update') {
            $status = in_array($_POST['status'], ['new','contacted','closed']) ? $_POST['status'] : 'new';
            $stmt = $DBcon->prepare("UPDATE ad_inquiries SET status = ? WHERE id = ?");
            $stmt->bind_param('si', $status, $id);
            $stmt->execute();
        } elseif ($action === 'delete') {
            $stmt = $DBcon->prepare("DELETE FROM ad_inquiries WHERE id = ?");
            $stmt->bind_param('i', $id);
            $stmt->execute();
        }
    }
    header('Location: ads-inquiries.php');
    exit;
}

// Fetch all ad inquiries
$result = $DBcon->query("SELECT id, company, contact_name, email, message, status, submitted_at FROM ad_inquiries ORDER BY submitted_at DESC");
$csrfToken = generate_csrf_token();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./_includes/admin_head.php" ?>
    <title>Admin: Ad Inquiries</title>
</head>
<body>
<div class="container my-5">
    <h1>Advertising Inquiries</h1>
    <div class="mb-4">
        <a href="ads-inquiries.php" class="btn btn-outline-secondary btn-sm">Manage Ads Inquiries</a>
        <a href="games.php" class="btn btn-outline-secondary btn-sm">Manage Games</a>
        <a href="features.php" class="btn btn-outline-secondary btn-sm">Manage Features</a>
        <a href="logout.php" class="btn btn-outline-secondary btn-sm">Logout</a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>ID</th><th>Company</th><th>Contact</th><th>Email</th><th>Message</th><th>Status</th><th>Submitted At</th><th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['company']) ?></td>
                <td><?= htmlspecialchars($row['contact_name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                <td><?= htmlspecialchars($row['status']) ?></td>
                <td><?= htmlspecialchars($row['submitted_at']) ?></td>
                <td>
                    <form method="post" class="d-inline">
                        <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="action" value="update">
                        <select name="status" class="form-select form-select-sm d-inline w-auto">
                            <?php foreach (['new','contacted','closed'] as $s): ?>
                                <option value="<?= $s ?>" <?= $row['status']==$s?'selected':''?>><?= ucfirst($s) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                    </form>
                    <form method="post" class="d-inline" onsubmit="return confirm('Delete this inquiry?');">
                        <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="action" value="delete">
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include "./_includes/admin_footer.php" ?>
</body>
</html>
