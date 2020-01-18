<?php
/**
 * Insert article Items into the database table
 *
 */
include_once "../../assets/Constants.php";
//Open an instance of the database handler for articles
include "../../database/Snarc_Database.php";
include "../../database/ArticlesModel.php";
include "../../uploader/Uploader.php";
//include "../../emailer/EmailHandler.php";

if( isset($_POST['articleTitle']) ){
    console_log("POST articleTitle set: \n");
} else {
    console_log("POST variable is not set: \n");
}
print_r($_FILES);
$filename = $_FILES['file_upload']['name'];
console_log("FILES: name: ".$filename);
$tmp_name = $filename;

$articleArray = [
    'title' => $_POST['articleTitle'],
    'author' => htmlspecialchars($_POST['articleAuthor']),
    'date' => htmlspecialchars($_POST['articleDate']),
    'file' => htmlspecialchars($_POST['articleFile']),
    'name' => htmlspecialchars($_POST['articleName' ]),
    'email' => htmlspecialchars($_POST['pdfArticleCheckbox']),
    'level' => htmlspecialchars($_POST['memberArticleCheckbox']),
];

// upload the file here
$targetDir = "/documents/";
$uploader = new Uploader();
$uploader->upload_pdf($filename, $tmp_name, $targetDir );


//console_log("Calling ArticlesModel:: ");
$articleItem = new ArticlesModel();
//Insert the details into the database table
$sqlResult = $articleItem->insertArticle( $articleArray );


function console_log($data) {
    //Output to dev tools Network>Response
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo $output;
}
