<?php
// admin/games.php
session_start();
require_once '../includes/global.php';
require_once '../bin/dbconnect.php';
require_once "./../admin/csrf.php";
$DBcon->set_charset('utf8mb4');

// Simple auth: replace with real auth logic
if (empty($_SESSION['is_admin'])) {
    header('Location: login.php');
    exit;
}

// Fetch dropdown options
$platformOptions = ['PC','Console','Mobile','Cross-platform'];
$modelOptions    = ['Free-to-Play','Subscription','Buy-to-Play'];
$styleOptions    = ['Arcade','Simulation','Rhythm','Mixed'];
// Initialize
$id = $_GET['id'] ?? null;
$gameData = [
    'title'=>'','slug'=>'','platform'=>'','model'=>'','genre'=>'',
    'fishing_style'=>'','release_date'=>'','developer'=>'',
    'official_url'=>'','thumbnail'=>'','description'=>''
];

// If editing, load existing data
if ($id) {
    $stmt = $DBcon->prepare("SELECT * FROM games WHERE id=? LIMIT 1");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $gameData = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf_token($_POST['csrf_token'] ?? null)) {
        die('Invalid CSRF token.');
    }
    $action = $_POST['action'] ?? '';
    if ($action === 'save') {
        // Gather inputs
        $fields = [
            $_POST['title'], $_POST['slug'], $_POST['platform'], $_POST['model'],
            $_POST['genre'], $_POST['fishing_style'], $_POST['release_date'],
            $_POST['developer'], $_POST['official_url'], $_POST['thumbnail'],
            $_POST['description']
        ];
        if (!empty($_POST['id'])) {
            // Update existing game
            $stmt = $DBcon->prepare(
                "UPDATE games SET title=?, slug=?, platform=?, model=?, genre=?, fishing_style=?, release_date=?, developer=?, official_url=?, thumbnail=?, description=? WHERE id=?"
            );
            $stmt->bind_param(str_repeat('s', count($fields)) . 'i', ...array_merge($fields, [$_POST['id']]));
        } else {
            // Create new game
            $stmt = $DBcon->prepare(
                "INSERT INTO games (title,slug,platform,model,genre,fishing_style,release_date,developer,official_url,thumbnail,description) VALUES (?,?,?,?,?,?,?,?,?,?,?)"
            );
            $stmt->bind_param(str_repeat('s', count($fields)), ...$fields);
        }
        $stmt->execute();
        header('Location: games.php');
        exit;

    } elseif ($action === 'delete' && !empty($_POST['id'])) {
        $stmt = $DBcon->prepare("DELETE FROM games WHERE id=?");
        $stmt->bind_param('i', $_POST['id']);
        $stmt->execute();
        header('Location: games.php');
        exit;
    }
}

// Fetch all games for listing
$games = $DBcon->query("SELECT id, title, platform, model FROM games ORDER BY title");

// Generate CSRF token for forms
$csrfToken = generate_csrf_token();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./_includes/admin_head.php" ?>
    <title>Admin: Manage Games</title>
</head>
<body>
<div class="container my-5">
    <h1>Games Administration</h1>
    <div class="mb-4">
        <a href="ads-inquiries.php" class="btn btn-outline-secondary btn-sm">Manage Ads Inquiries</a>
        <a href="games.php" class="btn btn-outline-secondary btn-sm">Manage Games</a>
        <a href="features.php" class="btn btn-outline-secondary btn-sm">Manage Features</a>
        <a href="logout.php" class="btn btn-outline-secondary btn-sm">Logout</a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr><th>ID</th><th>Title</th><th>Platform</th><th>Model</th><th>Actions</th></tr>
        </thead>
        <tbody>
        <?php while ($row = $games->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= htmlspecialchars($row['platform']) ?></td>
                <td><?= htmlspecialchars($row['model']) ?></td>
                <td>
                    <a href="games.php?id=<?= $row['id'] ?>">Edit</a>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Delete this game?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <h2 class="mt-5"><?= isset($_GET['id']) ? 'Edit' : 'Add New' ?> Game</h2>
    <form method="post" class="mt-3">
        <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
        <input type="hidden" name="action" value="save">
        <?php if ($id): ?><input type="hidden" name="id" value="<?= $id ?>"><?php endif; ?>
        <div class="mb-3">
            <label for="title" class="form-label">Title:<br><input id="title" class="form-control" type="text" name="title" value="<?= htmlspecialchars($gameData['title']) ?>" required></label>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug:<br><input id="slug" class="form-control" type="text" name="slug" value="<?= htmlspecialchars($gameData['slug']) ?>" required></label>
        </div>
        <div class="mb-3">
            <label for="platform" class="form-label">Platform:<br>
                <select id="platform" class="form-control" name="platform" required>
                    <?php foreach ($platformOptions as $opt): ?>
                        <option value="<?= $opt ?>" <?= $opt === $gameData['platform'] ? 'selected' : '' ?>><?= $opt ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Business Model:<br>
                <select id="model" class="form-control" name="model" required>
                    <?php foreach ($modelOptions as $opt): ?>
                        <option value="<?= $opt ?>" <?= $opt === $gameData['model'] ? 'selected' : '' ?>><?= $opt ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre:<br><input id="genre" class="form-control" type="text" name="genre" value="<?= htmlspecialchars($gameData['genre']) ?>"></label>
        </div>
        <div class="mb-3">
            <label for="fishing_style" class="form-label">Fishing Style:<br>
                <select id="fishing_style" class="form-control" name="fishing_style">
                    <?php foreach ($styleOptions as $opt): ?>
                        <option value="<?= $opt ?>" <?= $opt === $gameData['fishing_style'] ? 'selected' : '' ?>><?= $opt ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date:<br><input id="release_date" class="form-control" type="date" name="release_date" value="<?= htmlspecialchars($gameData['release_date']) ?>"></label>
        </div>
        <div class="mb-3">
            <label for="developer" class="form-label">Developer:<br><input id="developer" class="form-control" type="text" name="developer" value="<?= htmlspecialchars($gameData['developer']) ?>"></label>
        </div>
        <div class="mb-3">
            <label for="official_url" class="form-label">Official URL:<br><input id="official_url" class="form-control" type="url" name="official_url" value="<?= htmlspecialchars($gameData['official_url']) ?>"></label>
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail Path:<br><input id="thumbnail" class="form-control" type="text" name="thumbnail" value="<?= htmlspecialchars($gameData['thumbnail']) ?>"></label>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:<br><textarea id="description" class="form-control" name="description"><?= htmlspecialchars($gameData['description']) ?></textarea></label>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Save Game</button>
        </div>
    </form>
</div>
<?php include "./_includes/admin_footer.php" ?>
</body>
</html>
