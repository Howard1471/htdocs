<?php
/**
 * Insert article Items into the database table
 *
 */


if( isset($_POST['articleTitle']) ){
    console_log("POST articleTitle set: ");
} else {
    console_log("POST variable is not set: ");
}

$articleArray = [
    'title' => $_POST['articleTitle'],
    'author' => htmlspecialchars($_POST['articleAuthor']),
    'date' => htmlspecialchars($_POST['articleDate']),
    'file' => htmlspecialchars($_POST['articleFile']),
    'email' => htmlspecialchars($_POST['pdfArticleCheckbox']),
    'level' => htmlspecialchars($_POST['memberArticleCheckbox']),
];

//Open an instance of the database handler for News Items
include "../../database/Snarc_Database.php";
include "../../database/ArticlesModel.php";
//include "../../emailer/EmailHandler.php";

console_log("Calling ArticlesModel:: ");
$articleItem = new ArticlesModel();
//Insert the details into the database table
$sqlResult = $articleItem->insertArticle( $articleArray );

//



function console_log($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);
    $msg = 'console.log(' . json_encode($output, JSON_HEX_TAG).');';

    echo "<script>".$msg."</script>";
}
