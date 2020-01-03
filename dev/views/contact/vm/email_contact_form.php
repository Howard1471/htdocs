<?php
//This code calls the emailer to send out a contact form email

if( isset($_POST['contactName']) ){
    $contactName = $_POST['contactName'];
} else {
    echo "POST variable is not set";
}

$contactName = $_POST['contactName'];
$contactEmail = htmlspecialchars($_POST['contactEmail']);
$contactSubject = htmlspecialchars($_POST['contactSubject']);
$contactMessage = htmlspecialchars($_POST['contactMessage']);
dd("email_contact_form.php started successfully");
$emailHandler = new EmailHandler($contactName, $contactEmail, $contactSubject, $contactMessage);
$emailHandler->Mail_Sender();

