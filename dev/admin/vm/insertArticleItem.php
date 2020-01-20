<?php
/**
 * Upload the file
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
//test to ensure this has come from the form
if(!isset($_POST['submit'])){
    header("Location:".ROOT_INDEX);
}

$filename = $_FILES['file_upload']['name'];

$targetDir = DOCUMENTS;

$fileType = strtolower(pathinfo($targetDir.$filename,PATHINFO_EXTENSION));
if(file_exists($targetDir.$filename)){
    header("Location:../uploadfail.php?code=1");
}
if($_FILES['file_upload']['size'] > 10485759 ){
    header("Location:../uploadfail.php?code=2");
}
if($fileType != "pdf"){
    header("Location:../uploadfail.php?code=3");
}
$tmp_name = $_FILES['file_upload']['tmp_name'];
console_log($_FILES);
// upload the file here
$uploader = new Uploader();
$uploader->upload_pdf($filename, $tmp_name, $targetDir );
$uploadSuccess = $uploader->getUploadSuccess();

var_dump($_POST);

if(!$uploadSuccess){
    header("Location:../uploadfail.php/?code=4");
} else {

    $articleArray = [
        'title' => $_POST['articleTitle'],
        'author' => htmlspecialchars($_POST['articleAuthor']),
        'date' => htmlspecialchars($_POST['articleDate']),
        'file' => $filename,
        'name' => htmlspecialchars($_POST['articleName']),
        'email' => htmlspecialchars($_POST['pdfArticleCheckbox']),
        'level' => htmlspecialchars($_POST['memberArticleCheckbox']),
        'enabled' => htmlspecialchars($_POST['enabled']),
    ];



    $articleItem = new ArticlesModel();
    //Insert the details into the database table
    $sqlResult = $articleItem->insertArticle($articleArray);
}

function console_log($data) {
    //Output to dev tools Network>Response
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>".$output."</script>";
}
