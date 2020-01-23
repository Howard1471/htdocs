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
    $articleArray = [
        'title' => $_POST['articleTitle'],
        'author' => htmlspecialchars($_POST['articleAuthor']),
        'date' => htmlspecialchars($_POST['articleDate']),
        'file' => $filename,
        'pdfCheck' => ( isset($_POST['pdfArticleCheckbox']) == true ? 1: 0),
        'memberCheck' => ( isset($_POST['memberArticleCheckbox']) == true ? 1: 0),
        'enabled' => ( isset($_POST['enabled']) == true ? 1: 0),
    ];

    $failStr = $articleArray['pdfCheck'];
    header("Location:../uploadfail.php/?code='fail String'".$failStr);

    $articleItem = new ArticlesModel();
    //Insert the details into the database table
    $sqlResult = $articleItem->insertArticle($articleArray);


    header("Location:../uploadsuccess.php/?filename=".$failStr);

}

function console_log($data) {
    //Output to dev tools Network>Response
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>".$output."</script>";
}
