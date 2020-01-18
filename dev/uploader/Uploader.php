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

    public function upload_pdf( $filename, $tmp_name, $targetDir )
    {
        //$targetDir = "/documents/";
        $mimeType = "application/pdf; charset=binary";

        $this->console_log("Target Directory to upload: ".$targetDir);
        $this->console_log("Filename to upload: ".$filename);
        $this->console_log("Temporary Filename: ".$tmp_name);
        $this->console_log("Full Pathname:".$targetDir.$filename);


        //set up the MIME type to check for.
//        exec("file -bi " .$filename, $out);
//            if ( $out != $mimeType) {
                $success = move_uploaded_file( $tmp_name,$targetDir.$filename);
                if($success){
                    chmod($targetDir.$filename, 0755);
                    $this->console_log("success in uploading");
                }
//            }
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
    private function console_log($data) {
        //Output to dev tools Network>Response
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo $output."\n";
    }
}
