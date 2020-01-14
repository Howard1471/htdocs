<?php
/**
 * Insert article Items into the database table
 *
 */


if( isset($_POST['articleTitle']) ){
    console_log("POST articleTitle set: ");
} else {
    console_log("POST variable is not set");
}

$articleArray = [
    'title' => $_POST['articleTitle'],
    'author' => htmlspecialchars($_POST['articleAuthor']),
    'date' => htmlspecialchars($_POST['articleDate']),
    'file' => htmlspecialchars($_POST['articleFile']),
];
$emailNotification = htmlspecialchars($_POST['emailNote']);

//Open an instance of the database handler for News Items
include "../../database/Snarc_Database.php";
include "../../database/NewsItemModel.php";
//include "../../emailer/EmailHandler.php";

$articleItem = new ArticlesModel();
//Insert the details into the database table
$sqlResult = $articleItem->insertArticle( articleArray );

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
