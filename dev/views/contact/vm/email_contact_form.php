<!doctype html>
<html lang="en">
<head>
<?php
//This code calls the emailer to send out a contact form email
include "../../../assets/Constants.php";

if( isset($_POST['contactName']) ){
    console_log("POST variable is set");
} else {
    console_log("POST variable is not set");
}

$contactName = $_POST['contactName'];
$contactEmail = htmlspecialchars($_POST['contactEmail']);
$contactSubject = htmlspecialchars($_POST['contactSubject']);
$contactMessage = htmlspecialchars($_POST['contactMessage']);
dd("email_contact_form.php started successfully");
$emailHandler = new EmailHandler($contactName, $contactEmail, $contactSubject, $contactMessage);
$emailHandler->Mail_Sender();

function console_log($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

