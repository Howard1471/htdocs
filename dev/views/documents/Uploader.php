<?php


class Uploader
{

}

/**************************************** File upload functions ********************************/
// variables posted
// File to Upload "file1"
//
//Upload process, returns True if successfull
function upload_pdf( )
{
    global $UploadFile, $TempFile, $DocTitle, $DocAuthor;

//upload_max_filesize should be set to 5M
    $TargetDir = "../Articles/";
    $mimeType = "application/pdf; charset=binary";

    //set up the MIME type to check for.
    exec("file -bi " .$TempFile, $out);
    if ( $out != $mimeType) {
        //echo "<br>MIME type correct for ".$UploadFile."<br>";

        // preserve file from temporary directory
        $success = move_uploaded_file($TempFile,$TargetDir.$UploadFile);
        if (!$success ){
            header("Location: ../Error_Trap.php?Errno=42"); //PDF Error
        }
        else
        {
            chmod( $TargetDir.$UploadFile, 0755 );
        }

    } else {
        header("Location: ../Error_Trap.php?Errno=43"); //PDF Error
    }
    //header("Location: ../Error_Trap.php?Errno=40"); //PDF Error
}
function upload_CheckExistance( $TargetFile )
{
    //Test for filename already existing
    return (file_exists($TargetFile));
}
function upload_DeleteFile ($TargetFile)
{
    //Delete the target file if it exists
    if (upload_CheckExistance( $TargetFile )) {
        unlink ($TargetFile);
    }
}