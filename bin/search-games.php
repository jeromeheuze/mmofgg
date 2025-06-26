<?php
// ajax/search-games.php
header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/../includes/global.php';
require __DIR__ . '/../bin/dbconnect.php';
$DBcon->set_charset('utf8mb4');

$term = trim($_GET['term'] ?? '');
if ($term === '') {
    echo json_encode([]);
    exit;
}

$stmt = $DBcon->prepare("
  SELECT title, slug
    FROM games
   WHERE title LIKE ?
   ORDER BY title
   LIMIT 10
");
$like = "%{$term}%";
$stmt->bind_param('s', $like);
$stmt->execute();
$rs = $stmt->get_result();

$suggestions = [];
while ($row = $rs->fetch_assoc()) {
    $suggestions[] = [
        'label' => $row['title'],
        'value' => $row['title'],
        'slug'  => $row['slug']
    ];
}

echo json_encode($suggestions);
exit;