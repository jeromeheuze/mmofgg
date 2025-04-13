<?php
include "./../includes/global.php";
require_once './dbconnect.php';
include "./class/NewsletterSubscription.php";

$Newsletter = new NewsletterSubscription(DBHOST, DBUSER, DBPASS, DBNAME);

$email = strip_tags($_POST['e']);

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $input_email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $nlCheck = $Newsletter->subscribe($input_email);
    if ($nlCheck === 'Successfully subscribed!') {
        echo "1";
    } elseif ($nlCheck === 'Email Exists') {
        echo "2";
    } else {
        echo "0";
    }

} else {
    echo "-1";
}