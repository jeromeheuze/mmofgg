<?php
// submit-ad-inquiry.php
require __DIR__ . '/../includes/global.php';
require __DIR__ . '/../bin/dbconnect.php';
require __DIR__ . '/../admin/csrf.php';  // for CSRF protection
session_start();
$DBcon->set_charset('utf8mb4');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

// Verify CSRF token
if (!verify_csrf_token($_POST['csrf_token'] ?? null)) {
    http_response_code(400);
    exit('Invalid CSRF token.');
}

// Validate input
$company      = trim($_POST['company'] ?? '');
$contact_name = trim($_POST['contact_name'] ?? '');
$email        = trim($_POST['email'] ?? '');
$message      = trim($_POST['message'] ?? '');

if ($company && $contact_name && filter_var($email, FILTER_VALIDATE_EMAIL) && $message) {
    $stmt = $DBcon->prepare("
      INSERT INTO ad_inquiries (company, contact_name, email, message)
      VALUES (?, ?, ?, ?)
    ");
    $stmt->bind_param('ssss', $company, $contact_name, $email, $message);
    $stmt->execute();
}

// Redirect back with success flag
header('Location: /advertisement/?success=1');
exit;
