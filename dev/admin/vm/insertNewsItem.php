<?php
/**
 * Insert news Items into the database table
 *
 */


if( isset($_POST['newsTitle']) ){
    console_log("POST newsTitle set: ");
} else {
    console_log("POST variable is not set");
}

$newsArray = [
    'title' => $_POST['newsTitle'],
    'author' => htmlspecialchars($_POST['newsAuthor']),
    'date' => htmlspecialchars($_POST['newsDate']),
    'text' => htmlspecialchars($_POST['newsText']),
    ];
$emailNotification = htmlspecialchars($_POST['emailNote']);

//Open an instance of the database handler for News Items
include "../../database/Snarc_Database.php";
include "../../database/NewsItemModel.php";
//include "../../emailer/EmailHandler.php";

$newsItem = new NewsItemModel();
//Insert the details into the database table
$sqlResult = $newsItem->insertNewsItem( $newsArray );

if ($sqlResult == false){
    console_log("NewsItem Not inserted into database");
}


function console_log($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);
    $msg = 'console.log(' . json_encode($output, JSON_HEX_TAG).');';

    echo $msg;
}




