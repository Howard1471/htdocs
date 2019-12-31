<?php
/**
 * Insert news Items into the database table
 *
 */


if( isset($_POST['newsTitle']) ){
    $newsTitle = $_POST['newsTitle'];
    var_dump($newsTitle);
} else {
    echo "POST variable is not set";
    var_dump($_POST);
}

$newsTitle = $_POST['newsTitle'];
$newsAuthor = htmlspecialchars($_POST['newsAuthor']);
$newsDate = htmlspecialchars($_POST['newsDate']);
$newsText = htmlspecialchars($_POST['newsText']);
$emailNotification = htmlspecialchars($_POST['emailNote']);
//$tablename = 'snarc_newsitems';
$textOutput = "Title: ".$newsTitle." newsAuthor: ".$newsAuthor." Date: ".$newsDate." Text: ".$newsText;
echo $textOutput;

//Open an instance of the database handler for News Items

//Insert the details into the database table





