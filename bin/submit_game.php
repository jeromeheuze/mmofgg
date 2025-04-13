<?php
include "./../includes/global.php";
include "./dbconnect.php";
require_once './class/GameSubmission.php';

header('Content-Type: application/json');

//echo json_encode($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $submission = new GameSubmission(DBHOST, DBUSER, DBPASS, DBNAME);

    $title = $_POST['title'] ?? '';
    $genre = $_POST['genre'] ?? '';
    $description = $_POST['description'] ?? '';
    $developer = $_POST['developer'] ?? '';
    $link = $_POST['link'] ?? '';

    if ($title && $genre && $description && $developer && $link) {
        $response = $submission->saveGame($title, $genre, $description, $developer, $link);
        echo json_encode($response);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Please fill in all fields.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}