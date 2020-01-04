<?php
/**
 * Insert news Items into the database table
 *
 */


if( isset($_POST['newsTitle']) ){
    $newsTitle = $_POST['newsTitle'];
    console_log("newsTitle set: ".$newsTitle);
} else {
    console_log("POST variable is not set");
    console_log($_POST);
}

$newsTitle = $_POST['newsTitle'];
$newsAuthor = htmlspecialchars($_POST['newsAuthor']);
$newsDate = htmlspecialchars($_POST['newsDate']);
$newsText = htmlspecialchars($_POST['newsText']);
$emailNotification = htmlspecialchars($_POST['emailNote']);
//$tablename = 'snarc_newsitems';
$textOutput = "Title: ".$newsTitle." newsAuthor: ".$newsAuthor." Date: ".$newsDate." Text: ".$newsText;
console_log("Text received: ".$textOutput);

//Open an instance of the database handler for News Items

//Insert the details into the database table

function console_log($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}




