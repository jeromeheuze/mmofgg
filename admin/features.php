<?php
// admin/features.php
session_start();
require_once '../includes/global.php';
require_once '../bin/dbconnect.php';
require_once "./../admin/csrf.php";
$DBcon->set_charset('utf8mb4');

// Auth check
if (empty($_SESSION['is_admin'])) {
    header('Location: login.php');
    exit;
}

// Fetch list of games for dropdown
$gamesQuery = $DBcon->query("SELECT id, title FROM games ORDER BY title ASC");
$gameOptions = [];
while ($g = $gamesQuery->fetch_assoc()) {
    $gameOptions[$g['id']] = $g['title'];
}

// Initialize
$id = $_GET['id'] ?? null;
$featureData = ['game_id'=>'','feature'=>'','details'=>''];

// If editing, load existing feature
if ($id) {
    $stmt = $DBcon->prepare("SELECT game_id, feature, details FROM fishing_features WHERE id = ? LIMIT 1");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($fid, $fName, $fDetails);
    if ($stmt->fetch()) {
        $featureData = ['game_id'=>$fid,'feature'=>$fName,'details'=>$fDetails];
    }
    $stmt->close();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf_token($_POST['csrf_token'] ?? null)) {
        die('Invalid CSRF token.');
    }
    $action = $_POST['action'] ?? '';
    if ($action === 'save') {
        $game_id = (int)$_POST['game_id'];
        $feature = trim($_POST['feature']);
        $details = trim($_POST['details']);
        if (!empty($_POST['id'])) {
            // Update
            $stmt = $DBcon->prepare("UPDATE fishing_features SET game_id=?, feature=?, details=? WHERE id=?");
            $stmt->bind_param('issi', $game_id, $feature, $details, $_POST['id']);
        } else {
            // Insert
            $stmt = $DBcon->prepare("INSERT INTO fishing_features (game_id, feature, details) VALUES (?, ?, ?)");
            $stmt->bind_param('iss', $game_id, $feature, $details);
        }
        $stmt->execute();
        header('Location: features.php');
        exit;
    } elseif ($action === 'delete' && !empty($_POST['id'])) {
        $stmt = $DBcon->prepare("DELETE FROM fishing_features WHERE id = ?");
        $stmt->bind_param('i', $_POST['id']);
        $stmt->execute();
        header('Location: features.php');
        exit;
    }
}

// List all features
$featuresQuery = $DBcon->query(
    "SELECT ff.id, g.title AS game_title, ff.feature, ff.details
     FROM fishing_features ff
     JOIN games g ON ff.game_id = g.id
     ORDER BY g.title, ff.feature"
);

// Generate CSRF token for forms
$csrfToken = generate_csrf_token();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./_includes/admin_head.php" ?>
    <title>Admin: Manage Fishing Features</title>
</head>
<body>
<div class="container my-5">
    <h1>Fishing Features Administration</h1>
    <div class="mb-4">
        <a href="ads-inquiries.php" class="btn btn-outline-secondary btn-sm">Manage Ads Inquiries</a>
        <a href="games.php" class="btn btn-outline-secondary btn-sm">Manage Games</a>
        <a href="features.php" class="btn btn-outline-secondary btn-sm">Manage Features</a>
        <a href="logout.php" class="btn btn-outline-secondary btn-sm">Logout</a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
        <tr><th>ID</th><th>Game</th><th>Feature</th><th>Details</th><th>Actions</th></tr>
        </thead>
        <tbody>
        <?php while ($row = $featuresQuery->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['game_title']) ?></td>
                <td><?= htmlspecialchars($row['feature']) ?></td>
                <td><?= htmlspecialchars($row['details']) ?></td>
                <td>
                    <a href="features.php?id=<?= $row['id'] ?>">Edit</a>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button class="btn btn-primary" type="submit" onclick="return confirm('Delete this feature?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <h2 class="mt-5"><?= isset($_GET['id']) ? 'Edit' : 'Add New' ?> Fishing Feature</h2>
    <form method="post" class="mt-3">
        <input type="hidden" name="action" value="save">
        <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
        <?php if ($id): ?><input type="hidden" name="id" value="<?= $id ?>"><?php endif; ?>
        <div class="mb-3">
            <label for="game_id" class="form-label">Game:<br>
                <select id="game_id" class="form-control" name="game_id" required>
                    <option value="">Select Game</option>
                    <?php foreach ($gameOptions as $gid => $title): ?>
                        <option value="<?= $gid ?>" <?= $gid == $featureData['game_id'] ? 'selected' : '' ?>><?= htmlspecialchars($title) ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <div class="mb-3">
            <label for="feature" class="form-label">Feature:<br>
                <input id="feature" class="form-control" type="text" name="feature" value="<?= htmlspecialchars($featureData['feature']) ?>" required>
            </label>
        </div>
        <div class="mb-3">
            <label for="details" class="form-label">Details:<br>
                <textarea id="details" class="form-control" name="details" required><?= htmlspecialchars($featureData['details']) ?></textarea>
            </label>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Save Feature</button>
        </div>
    </form>
</div>
<?php include "./_includes/admin_footer.php" ?>
</body>
</html>
