<?php
/**
 * Upload the file
 * Insert article Items into the database table
 *
 */
include_once "../../assets/Constants.php";
//Open an instance of the database handlers for articles
include "../../database/Snarc_Database.php";
include "../../database/ArticlesModel.php";
include "../../includes/TimeAndDateServices.php";
include "../../uploader/Uploader.php";
//include "../../emailer/EmailHandler.php";

if( isset($_POST['articleTitle']) ){
        console_log("POST articleTitle set: \n");
    } else {
        console_log("POST variable is not set: \n");
    }

//test to ensure this has come from the form
if(!isset($_POST['submit'])){
    header("Location:".ROOT_INDEX);
}

//Set up document name and path
$filename = $_FILES['file_upload']['name'];
$targetDir = "../../documents/";

//Check whether a file with the same name exists
if(file_exists($targetDir.$filename)){
    header("Location:../uploadfail.php?code=1");
    }

//check the file size
if($_FILES['file_upload']['size'] > 10485759 ){
    header("Location:../uploadfail.php?code=2");
    }

//Check the file extension
$fileType = strtolower(pathinfo($targetDir.$filename,PATHINFO_EXTENSION));
if($fileType != "pdf"){
    header("Location:../uploadfail.php?code=3");
    }

//get the temporary storage filename
$tmp_name = $_FILES['file_upload']['tmp_name'];

// upload the file here
$uploader = new Uploader();
$uploader->upload_pdf($filename, $tmp_name, $targetDir );
$uploadSuccess = $uploader->getUploadSuccess();

if(!$uploadSuccess){
    header("Location:../uploadfail.php/?code=4");
} else {
    //success, store the table data
    $dateStr = $_POST['articleDate'];
    $dateConverter = new TimeAndDateServices();
    $articleArray = [
        'title' => $_POST['articleTitle'],
        'author' => htmlspecialchars($_POST['articleAuthor']),
        'date' => $dateConverter->convertUKtoSQLDat($dateStr),
        'file' => $filename,
        'pdfCheck' => ( $_POST['pdfArticleCheckbox'] == 'pdf' ? 1: 0),
        'memberCheck' => ( $_POST['memberArticleCheckbox'] == 'member' ? 1: 0),
        'enabled' => ( $_POST['enabled'] == 'visible' ? 1: 0),
    ];

    $articleItem = new ArticlesModel();
    //Insert the details into the database table
    $sqlResult = $articleItem->insertArticle($articleArray);

    header("Location:../uploadsuccess.php/?filename=".$filename);

}
function console_log($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);
    $msg = 'console.log(' . json_encode($output, JSON_HEX_TAG).');';

    echo $msg;
}
