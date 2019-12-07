<?php
/* Support Functions for Gallery upload access
Max file size set to 2Mb

*/

// All code to sit within the Gallery directory
global $Target_root, $Target_root1,$Target_root2,$Target_root3,$Target_root4;
global $Albumname, $UserTitle, $Datafile,$newwidth,$newheight;

$Target_root = "../Gallery/";
$Target_root1 = $Target_root . "Catalog/";
$Target_root2 = $Target_root . "images/";
$Target_root3 = $Target_root . "Data/";
$Target_root4 = $Target_root . "html/";

$Report_Err = 0;
$Image_Err =0;
$Datafile = $Target_root1 . "catalog.csv";

global $MaxFileSize, $newwidth;
$MaxFileSize = 2; //2Mb
$newwidth = 800; // New Landscape picture width

//Variables for catalog
global $Record_Reference,$Record_PhotoFilename,$Record_Albumname,$Record_UploadDate,$Record_Height,$Record_Width,$Record_PhotoTitle;
$Record_Reference = 0;
$Record_PhotoFilename = "";
$Record_Albumname = "";
$Record_UploadDate = "";
$Record_Height = "";
$Record_Width = "";
$Record_PhotoTitle = "";

//Base reference prefix
global $GalleryRef;
$GalleryRef = "VJD";


function CreateDatafile( $Filename )
{
touch ( $Filename );
}
function AppendDatafile ( $Filename )
{
global $Record_Reference,$Record_PhotoFilename,$Record_Albumname,$Record_UploadDate,$Record_Height,$Record_Width,$Record_PhotoTitle;
// Append each data item in order
$fp = fopen( $Filename , 'a' );
fwrite( $fp,$Record_Reference );
fwrite( $fp,$Record_PhotoFilename );
fwrite( $fp,$Record_Albumname );
fwrite( $fp,$Record_UploadDate );
fwrite( $fp,$Record_Height );
fwrite( $fp,$Record_Width );
fwrite( $fp,$Record_PhotoTitle );
fclose($fp);
}
function ReadDataFile ( $fp )
{
global $Record_Reference,$Record_PhotoFilename,$Record_Albumname,$Record_UploadDate,$Record_Height,$Record_Width,$Record_PhotoTitle;
$Record_Reference = fread( $fp);
$Record_PhotoFilename = fread( $fp);
$Record_Albumname = fread( $fp);
$Record_UploadDate = fread( $fp);
$Record_Height = fread( $fp);
$Record_Width = fread( $fp);
$Record_PhotoTitle = fread( $fp);
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

function WriteCatalog ( $imagefilename )
{
//Files have been copied across.
//Now to update the database file

global $Albumname, $UserTitle, $Datafile,$newwidth,$newheight;
global $Record_Reference,$Record_PhotoFilename,$Record_Albumname,$Record_UploadDate,$Record_Height,$Record_Width,$Record_PhotoTitle;
global $GalleryRef;
 
$Record_PhotoFilename = $imagefilename;
$Record_Albumname = $UserTitle;
$Record_UploadDate = date("d.m.y");
$Record_Height= (int)$newheight;
$Record_Width = (int)$newwidth;
                         	
if (!file_exists( $Datafile ) )
	{
	echo "<br/>Catalog File not found, new one created<br />";
	$Record_Reference = $GalleryRef."001";  //New database so set numbers to start
	$Record_PhotoTitle = $Record_Reference;
	$fp = fopen( $Datafile, 'w' );
	fwrite ( $fp, $Record_Reference.",".$Record_PhotoFilename.",".$Record_Albumname.",".$Record_UploadDate.",".$Record_Height.",".$Record_Width.",".$Record_PhotoTitle. "\n" );
	fclose($fp);
	}
	else
	{
	//echo "<br/>Data File found, current one used<br />";
	$Record_Reference = sprintf($GalleryRef."%03d", CountRecords( $Datafile ) + 1);
	$Record_PhotoTitle = $Record_Reference;
	$fp = fopen( $Datafile, 'a' );
	fwrite ( $fp, $Record_Reference.",".$Record_PhotoFilename.",".$Record_Albumname.",".$Record_UploadDate.",".$Record_Height.",".$Record_Width.",".$Record_PhotoTitle. "\n" );
	fclose($fp);
	//ReverseDataFile( $Datafile );
	}
echo "Catalogue updated";
}
function FetchCatalog( $Reference )
{
	global $Albumname, $UserTitle, $Datafile,$newwidth,$newheight;
	global $Record_Reference,$Record_PhotoFilename,$Record_Albumname,$Record_UploadDate,$Record_Height,$Record_Width,$Record_PhotoTitle;
//echo "Searching for " . $Reference . "<br />";
$Record_Array = array();

$count = 0;
$fp = fopen( $Datafile , 'r' );
$line = fgets($fp, 1024 );
$Record_Array = explode(',', $line );

	if ( $Record_Array[0] == $Reference ) 
	{
		//echo "Line -" . $line . "<br />";
		$Record_Reference = $Record_Array[0];
		$Record_PhotoFilename = $Record_Array[1];
		$Record_Albumname = $Record_Array[2];
		$Record_UploadDate = $Record_Array[3];
		$Record_Height = $Record_Array[4];
		$Record_Width = $Record_Array[5];
		$Record_PhotoTitle = $Record_Array[6];
		//echo "Array -" . $Record_Reference . "," . $Record_PhotoFilename . "," . $Record_Albumname . "," . $Record_UploadDate . "," . $Record_Height . "," . $Record_Width . "," . $Record_PhotoTitle . "<br />";
	}
	else
	{

		while ( !feof( $fp ) )
		{
    	//$count++;
    	$line = fgets($fp, 1024 );
		$Record_Array = explode(',', $line );
		if ($Record_Array[0] == $Reference) 
			{
			//echo "Loop -" . $line . "<br />";
			$Record_Reference = $Record_Array[0];
			$Record_PhotoFilename = $Record_Array[1];
			$Record_Albumname = $Record_Array[2];
			$Record_UploadDate = $Record_Array[3];
			$Record_Height = $Record_Array[4];
			$Record_Width = $Record_Array[5];
			$Record_PhotoTitle = $Record_Array[6];
			//echo "Array -" . $Record_Reference . "," . $Record_PhotoFilename . "," . $Record_Albumname . "," . $Record_UploadDate . "," . $Record_Height . "," . $Record_Width . "," . $Record_PhotoTitle . "<br />";
			}
		}
	//echo "$Record_Array[$count] <br />";
	}
fclose($fp);
}
function Thumbnail_Width( $R_Height,$R_Width )
{
$New_width = ( 90 / $R_Height )*$R_Width;
return ( $New_width );
}

function GetFilePathnameOnly( $Filename )
{

}

// Upload code for image file (imagefile). Filenumber is the array number
function UploadSingleImage ( $Filenumber )
{
	global $Target_root, $Target_root1,$Target_root2,$Target_root3,$Target_root4;
	global $MaxFileSize, $Datafile, $UserTitle,$newwidth,$newheight;
	global $Record_Reference,$Record_PhotoFilename,$Record_Albumname,$Record_UploadDate,$Record_Height,$Record_Width,$Record_PhotoTitle;
	
	//echo "Album name identified as " . $UserTitle . "<br />";
//Test whether there is any kind of error and react 
if ($_FILES['imagefile']["error"][$Filenumber] > 0)
	{
  	$Image_Err = $_FILES['imagefile']["error"][$Filenumber];
  	echo "Error: " . $Image_Err . "<br />";
  		if ($Image_Err = 2){ echo "Image File too large <br />"; }
		if ($Image_Err = 4){ echo "No Image File Selected <br />"; }
	}
	else // Code 0 means OK, 
  	{
  	echo "Image file details :<br>";
  	echo "File selected : " . $_FILES['imagefile']["name"][$Filenumber] . "  - ";
  	echo "Type: " . $_FILES['imagefile']["type"][$Filenumber] . "   - ";
  	echo "Size: " . round(($_FILES['imagefile']["size"][$Filenumber] / 1024),0) . " Kb  - ";
  	//echo "Stored in: " . $_FILES['imagefile']["tmp_name"][$Filenumber] ;
	echo "<br>";
  	}
// Restrict file types and sizes (Jpeg max 6Mb
// no support for GIFs ($_FILES[$Filehandle]["type"] == "image/gif") ||
// printf( "Testing against %d Kb<br/>",1024 * $MaxFileSize ); 
if ((($_FILES['imagefile']["type"][$Filenumber] == "image/jpeg") || ($_FILES['imagefile']["type"][$Filenumber] == "image/pjpeg"))
&& ($_FILES['imagefile']["size"][$Filenumber] < 1024*1024*$MaxFileSize))
{//1
//echo "File within type and size constraints. ";
		//Retest for errors based on the type and size tests being OK.
  		if ($_FILES['imagefile']["error"][$Filenumber] > 0)
    	{
    	echo "Incorrect image file format encountered.<br>";
    	//echo "Return Code: " . $_FILES[$Filehandle]["error"] . "<br />";
		$Image_Err = 3;
    	}
  		else
    	{ //2
    	//echo "Image file of correct type <br>";
    	//echo "Upload: " . $_FILES[$Filehandle]["name"] . "<br />";
    	//echo "Type: " . $_FILES[$Filehandle]["type"] . "<br />";
    	//echo "Size: " . ($_FILES[$Filehandle]["size"] / 1024) . " Kb<br />";
    	//echo "Temp file: " . $_FILES[$Filehandle]["tmp_name"] . "<br />";    
    
		// Test to ensure that the filename doesn't already exist.
			if (file_exists($Target_root3 ."/" . $UserTitle . "images/" . $_FILES['imagefile']["name"][$Filenumber]))
      		{
      		echo "Image file " . $_FILES['imagefile']["name"][$Filenumber] . " already exists.<br /> ";
	  		$Image_Err = 5;
	  		}
    		else
      		{
      		echo "Resizing & Copying file to target location<br />";
	  		//resize photo here
			$uploadedfile = $_FILES['imagefile']['tmp_name'][$Filenumber];
			$Original_Image = $_FILES['imagefile']['name'][$Filenumber];
			//echo "Source file " . $uploadedfile . ". ";
			$src = imagecreatefromjpeg($uploadedfile);
			list($width,$height)=getimagesize($uploadedfile);
			//echo "Current size : " . $width . "w X " . $height . "h.<br />  ";
			$newheight=(int)(($height/$width)*$newwidth);
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height); 
			$storename = $Target_root3 . $UserTitle . "/images/" . $_FILES['imagefile']['name'][$Filenumber];
			//echo "Storing file as " . $storename . "<br />";
			imagejpeg($tmp,$storename,100);
			//echo " New size     : " . $newwidth . "w X " . $newheight . "h. ";
			
			WriteCatalog ( $_FILES['imagefile']['name'][$Filenumber] );
			echo "File catalogued as ". $Record_Reference . "<br />";
			CreateNewhtml( $_FILES['imagefile']['name'][$Filenumber], $newheight, $newwidth );
      		// move_uploaded_file($_FILES[$Filehandle]["tmp_name"], $Target_root2 . $_FILES[$Filehandle]["name"]);
      		//echo "Stored in: " . $Target_root2 . $_FILES[$Filehandle]["name"]. "<br />";
	  		imagedestroy($src);
			imagedestroy($tmp); 
	  		}

    	}//2
	
}//1
else
{
  echo "<br/>Invalid image file<br/><br/>";
}
}//End of UpoadSingleFile function
//Upload code for text file 1 (userfile )
function UploadSingleText ( $Filehandle )
{
if ($_FILES["userfile"]["error"] > 0)
  {
  //echo "Error: " . $_FILES["userfile"]["error"] . "<br />";
  $Report_Err = 1;
  }
else
  {
  echo "File details :<br>";
  $UserFile = $_FILES["userfile"]["name"];
  echo "Report File : " . $UserFile . "<br />";
  //echo "Type: " . $_FILES["userfile"]["type"] . "<br />";
  //echo "Size: " . ($_FILES["userfile"]["size"] / 1024) . " Kb<br />";
  // echo "Stored in: " . $_FILES["userfile"]["tmp_name"];
  }
// Restrict file types and sizes
if (($_FILES["userfile"]["type"] == "text/plain") && ($_FILES["userfile"]["size"] < 1024*64))
  {
  	if ($_FILES["userfile"]["error"] > 0)
    {
    echo "<br>Incorrect text file format encountered.<br>";
    //echo "Return Code: " . $_FILES["userfile"]["error"] . "<br />";
	$Report_Err = 3;
    }
  	else
    {
    echo "File of correct type <br>";
    //echo "Upload: " . $_FILES["userfile"]["name"] . "<br />";
    //echo "Type: " . $_FILES["userfile"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["userfile"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["userfile"]["tmp_name"] . "<br />";    
    if (file_exists($Target_root1 . $_FILES["userfile"]["name"]))
      {
      echo $_FILES["userfile"]["name"] . " already exists.<br> ";
	  $Report_Err = 5;
      }
      else
      {
      echo "Copying file to internet server<br />";
      move_uploaded_file($_FILES["userfile"]["tmp_name"],
      $Target_root1 . $_FILES["userfile"]["name"]);
      //echo "Stored in: " . $Target_root1 . $_FILES["userfile"]["name"]. "<br />";
      }
    }
  }
  else
  {
  echo "Invalid text file selected, please try again<br />";
  $Report_Err = 1;
  }
	
	
}
//Display the list of Albums
Function DisplayFolderlist()
{
global $Target_root3;

//Fetch and display the list of folders in the Gallery/Data foldr
$folders = scandir ( $Target_root3 );
$AlbumCount = count( $folders );
if ($AlbumCount <= 2)
{
	echo "<i>There are currently no Albums to select</i>";
}
else
{
	
for ( $loop1 = 2; $loop1 < $AlbumCount; $loop1++) // zero based index
	{
	echo "<br /><a href=\"Gallery_Thumbnail_page.php?Albumname=" . $folders[$loop1] . "\">".$folders[$loop1]."</a>";
	}

echo "<br /><br />";	
echo "<p>Please select an album to view the files<p>";
}

}


function CreateNewAlbum( $Album_Name )
{
	global $Target_root3;
	
mkdir($Target_root3 . $Album_Name);
mkdir ($Target_root3 . $Album_Name . "/images" );
mkdir ($Target_root3 . $Album_Name . "/html" );

}
function CreateNewhtml( $filereference, $newheight, $newwidth )
{
	global $Target_root3, $UserTitle, $Record_Reference;
// $Record_Reference = VJD000 reference format	
//Create the new html file relevent to this reference (no file extensions)
$Filename = $Target_root3 ."/" . $UserTitle . "/html/" . $Record_Reference . ".htm";
$fp = fopen( $Filename , 'w' );
fwrite( $fp,"<html>\n" );
fwrite( $fp,"<head>\n" );
fwrite( $fp,"<meta http-equiv= Content-Type  content= text/html; charset=windows-1252>\n" );
fwrite( $fp,"<title>" . $Record_Reference ."</title>\n" );
fwrite( $fp,"</head>\n" );
fwrite( $fp,"<body>\n" );
fwrite( $fp,"<img border=0 src=\"..\\images\\" .$filereference . "\" width= " . $newwidth . " height= " . $newheight . ">\n" );
fwrite( $fp,"</body>\n" );
fwrite( $fp,"</html>\n" );
fclose($fp);
/*
<html>
<head>
<meta http-equiv= Content-Type  content= text/html; charset=windows-1252>
<title>100_3776</title>
</head>
<body>
<p><img border=0 src="..\images\100_3776.jpg" width= 800 height= 600></td>
</body>
</html>
*/

	
}

function SplitFilename( $Filename )
{
$String_array = explode( ".", $Filename );	
return ( $String_array[0] );	
}
?>
