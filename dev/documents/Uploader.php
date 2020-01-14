<?php

/**
 * Class Uploader
 * deals with the uploading of files to the documents directory
 *
 */
class Uploader
{


    public function __construct()
    {
        //constructor
    }

    public function upload_pdf( $filename )
    {
        $targetDir = ROOT."/documents/";
        $mimeType = "application/pdf; charset=binary";


        //set up the MIME type to check for.
        exec("file -bi " .$filename, $out);
            if ( $out != $mimeType) {
                $success = move_uploaded_file($filename,$targetDir.$filename);
                if($success){
                    chmod($targetDir.$filename, 0755);
                }
            }
    }
    public function upload_CheckExistance( $targetFile )
    {
        //Test for filename already existing
        return (file_exists($targetFile));
    }
    public function upload_DeleteFile ($targetFile)
    {
        //Delete the target file if it exists - This is a non reversible process
        if ($this->upload_CheckExistance( $targetFile )) {
            unlink ($targetFile);
        }
    }

}
