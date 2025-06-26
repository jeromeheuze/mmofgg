<?php
// bin/submit-review.php
session_start();
header('Content-Type: application/json; charset=utf-8');

require __DIR__ . '/../includes/global.php';
require __DIR__ . '/../bin/dbconnect.php';
require __DIR__ . '/../admin/csrf.php';  // for CSRF protection

$DBcon->set_charset('utf8mb4');

// Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
    exit;
}

// CSRF token check
if (!verify_csrf_token($_POST['csrf_token'] ?? null)) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid CSRF token']);
    exit;
}

// Validate inputs
$game_id   = (int) ($_POST['game_id'] ?? 0);
$user_name = trim($_POST['user_name'] ?? '');
$rating    = (int) ($_POST['rating'] ?? 0);
$comment   = trim($_POST['comment'] ?? '');

if ($game_id <= 0 || $user_name === '' || $rating < 1 || $rating > 5 || $comment === '') {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

// Insert review
$stmt = $DBcon->prepare(
    "INSERT INTO game_reviews (game_id, user_name, rating, comment) VALUES (?, ?, ?, ?)"
);
$stmt->bind_param('isis', $game_id, $user_name, $rating, $comment);
if (! $stmt->execute()) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $DBcon->error]);
    exit;
}

// Fetch updated average rating and total reviews
$q = $DBcon->prepare(
    "SELECT AVG(rating) AS avgRating, COUNT(*) AS totalReviews FROM game_reviews WHERE game_id = ?"
);
$q->bind_param('i', $game_id);
$q->execute();
$q->bind_result($avgRating, $totalReviews);
$q->fetch();

echo json_encode([
    'success'      => true,
    'avgRating'    => round((float)$avgRating, 2),
    'totalReviews' => (int)$totalReviews
]);
exit;
