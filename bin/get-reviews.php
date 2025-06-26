<?php
// bin/get-reviews.php
header('Content-Type: application/json; charset=utf-8');

require __DIR__ . '/../includes/global.php';
require __DIR__ . '/../bin/dbconnect.php';
$DBcon->set_charset('utf8mb4');

$game_id = (int)($_GET['game_id'] ?? 0);
if ($game_id <= 0) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid game ID']);
    exit;
}

// Fetch reviews
$stmt = $DBcon->prepare(
    "SELECT user_name, rating, comment, created_at
     FROM game_reviews
     WHERE game_id = ?
     ORDER BY created_at DESC"
);
$stmt->bind_param('i', $game_id);
$stmt->execute();
$result = $stmt->get_result();

$reviews = [];
while ($row = $result->fetch_assoc()) {
    $reviews[] = [
        'user_name'  => $row['user_name'],
        'rating'     => (int)$row['rating'],
        'comment'    => $row['comment'],
        'created_at' => $row['created_at']
    ];
}

// Fetch average & total
$q = $DBcon->prepare(
    "SELECT AVG(rating) AS avgRating, COUNT(*) AS totalReviews FROM game_reviews WHERE game_id = ?"
);
$q->bind_param('i', $game_id);
$q->execute();
$q->bind_result($avgRating, $totalReviews);
$q->fetch();

$response = [
    'reviews'      => $reviews,
    'avgRating'    => round((float)$avgRating, 2),
    'totalReviews' => (int)$totalReviews
];

echo json_encode($response);
exit;
