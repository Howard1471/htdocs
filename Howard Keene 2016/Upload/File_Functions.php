<?php
/* Support Functions for File access

*/

//$Target_root = "/home/www/acetrialsteam.co.uk/News/";
$Target_root = "../Gallery/";
$Target_root1 = $Target_root . "Report/";
$Target_root2 = $Target_root . "images/";
$Target_root3 = $Target_root . "Data/";
$Target_root4 = $Target_root . "html/";
$Report_Err = 0;
$Image_Err =0;
$newwidth=400; // New Landscape picture width
$Datafile = $Target_root3 . "catalog.dat";

$Record_Number = 0;
$Record_Headline = "";
$Record_Subheading = "";
$Record_TXTFilename = "";
$Record_PhotoFilename = "";
$Record_PhotoTitle = "";
$Record_UploadDate = "";

function CreateDatafile( $Filename )
{
touch ( $Filename );
}
function UpdateID ( $Number )
{ $Record_Number = Number; }
function UpdateHeadline ( $Headline )
{ $Record_Headline = $Headline; }
function UpdateSubheading ( $Subheading )
{ $Record_Subheading = $Subheading; }
function UpdateTXTFilename ( $TXTFilename )
{ $Record_Number = $TXTFilename; }
function UpdatePhotoFilename ( $PhotoFilename )
{ $Record_Number = $PhotoFilename; }
function UpdatePhotoTitle ( $PhotoTitle )
{ $Record_Number = $PhotoTitle; }
function UpdateUploadDate ( $UploadDate )
{ $Record_Number = $UploadDate; }

function AppendDatafile ( $Filename )
{
// Append each data item in order
$fp = fopen( $Filename , 'a' );
fwrite( $fp,$Record_Number );
fwrite( $fp,$Record_Headline );
fwrite( $fp,$Record_Subheading );
fwrite( $fp,$Record_TXTFilename );
fwrite( $fp,$Record_PhotoFilename );
fwrite( $fp,$Record_PhotoTitle );
fwrite( $fp,$Record_UploadDate );
fclose($fp);
}
function ReadDataFile ( $fp )
{
$Record_Number = fread( $fp);
$Record_Headline = fread( $fp);
$Record_Subheading = fread( $fp);
$Record_TXTFilename = fread( $fp );
$Record_PhotoFilename = fread( $fp );
$Record_PhotoTitle = fread( $fp );
$Record_UploadDate = fread( $fp );
fclose($fp);
}
//Reverse the order of the data file completely
function ReverseDataFile( $Filename )
{
$count = 0;
$fp = fopen( $Filename , 'r' );
$line = fgets($fp, 1024 );
$Record_Array[] = $line; //key will be zero
//echo "$line <br />";
	while ( !feof( $fp ) )
	{
    $count++;
    $line = fgets($fp, 1024 );
	$Record_Array[$count] = $line;
	//echo "$Record_Array[$count] <br />";
	}
fclose($fp);
rsort($Record_Array);
$fp = fopen( $Filename , 'w' );
for ($loop1 = 0; $loop1 <= $count; $loop1++ ) 
	{
	fwrite ( $fp, $Record_Array[$loop1] ); 
	}
fclose($fp);

}

//"$Reference,$DataTitle,$DataSubtitle,$DataUserFile,$DataImageTitle,$DataImageFile,$UploadDate\n"
function CountRecords( $Filename )
{
$count = 0;
$fp = fopen( $Filename , 'r' );
$line = fgets($fp, 1024 );
while ( !feof( $fp ) )
	{
    $count++;
    $line = fgets($fp, 1024 );
	}
fclose($fp);
return $count;
}

function GetFilePathnameOnly( $Filename )
{

}

// Upload code for file 2 (imagefile)
function UploadSingleFile ( $Filehandle )
{
//Test whether there is any kind of error and react 
if ($_FILES[$Filehandle]["error"] > 0)
	{
  	$Image_Err = $_FILES[$Filehandle]["error"];
  	echo "Error: " . $Image_Err . "<br />";
  		if ($Image_Err = 2){ echo "Image File too large <br />"; }
		if ($Image_Err = 4){ echo "No Image File Selected <br />"; }
	}
else // Code 0 means OK, 
  {
  echo "Image file details :<br>";
  echo "File selected : " . $_FILES[$Filehandle]["name"] . " ";
  // echo "Type: " . $_FILES[$Filehandle]["type"] . " ";
  //echo "Size: " . ($_FILES[$Filehandle]["size"] / 1024) . " Kb<br />";
  //echo "Stored in: " . $_FILES[$Filehandle]["tmp_name"];
  }
// Restrict file types and sizes (Jpeg max 6Mb
// no support for GIFs ($_FILES[$Filehandle]["type"] == "image/gif") || 
if ((($_FILES[$Filehandle]["type"] == "image/jpeg")
|| ($_FILES[$Filehandle]["type"] == "image/pjpeg"))
&& ($_FILES[$Filehandle]["size"] < 1024*1024*6))
{//1

//Retest for errors based on the type and size tests
  if ($_FILES[$Filehandle]["error"] > 0)
    {
    echo "Incorrect image file format encountered.<br>";
    //echo "Return Code: " . $_FILES[$Filehandle]["error"] . "<br />";
	$Image_Err = 3;
    }
  else
    { //2
    echo "Image file of correct type <br>";
    //echo "Upload: " . $_FILES[$Filehandle]["name"] . "<br />";
    //echo "Type: " . $_FILES[$Filehandle]["type"] . "<br />";
    //echo "Size: " . ($_FILES[$Filehandle]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES[$Filehandle]["tmp_name"] . "<br />";    
    
	// Test to ensure that the filename doesn't already exist.
	if (file_exists($Target_root2 . $_FILES[$Filehandle]["name"]))
      {
      echo "Image file " . $_FILES[$Filehandle]["name"] . " already exists. ";
	  $Image_Err = 5;
	  }
    else
      {
      echo "<br>Resizing & Copying file to target location<br />";
	  //resize photo here
		$uploadedfile = $_FILES['imagefile']['tmp_name'];
		$Original_Image = $_FILES['imagefile']['name'];
		//echo "Source file " . $uploadedfile . "<br />";
		$src = imagecreatefromjpeg($uploadedfile);
		list($width,$height)=getimagesize($uploadedfile);
		//echo "Current size : " . $width . "w X " . $height . "h  ";
		$newheight=($height/$width)*$newwidth;
		//echo "New size     : " . $newwidth . "w X " . $newheight . "h <br />";
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height); 
		$storename = $Target_root2 . $_FILES['imagefile']['name'];
		imagejpeg($tmp,$storename,100);

      // move_uploaded_file($_FILES[$Filehandle]["tmp_name"], $Target_root2 . $_FILES[$Filehandle]["name"]);
      	//echo "Stored in: " . $Target_root2 . $_FILES[$Filehandle]["name"]. "<br />";
	  	imagedestroy($src);
		imagedestroy($tmp); 
	  }

    }//2
	
}//1
else
{
  echo "<br/>Invalid image file<br />";
}
}//End of UpoadSingleFile function

?>
