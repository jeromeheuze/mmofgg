<?php
include "./../includes/global.php";
include "./dbconnect.php";
require_once './class/ContactSubmission.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $contact = new ContactSubmission(DBHOST, DBUSER, DBPASS, DBNAME);

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    if ($name && $email && $subject && $message) {
        $response = $contact->saveMessage($name, $email, $subject, $message);
        echo json_encode($response);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
