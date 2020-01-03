<?php
//This code calls the emailer to send out a contact form email

if( isset($_POST['contactName']) ){
    $newsTitle = $_POST['contactName'];
} else {
    echo "POST variable is not set";
}

$contactName = $_POST['contactName'];
$contactEmail = htmlspecialchars($_POST['contactEmail']);
$contactSubject = htmlspecialchars($_POST['contactSubject']);
$contactMessage = htmlspecialchars($_POST['contactMessage']);

$emailHandler = new EmailHandler($contactName, $contactEmail, $contactSubject, $contactMessage);
$emailHandler->Mail_Sender();

