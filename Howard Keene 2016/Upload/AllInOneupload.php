<?php
//File uploading code
$UserTitle = $_POST['headline'];
$UserSub = $_POST['subtitle'];
$ImageTitle = $_POST['phototitle'];

include( "File_Functions.php" );
//chmod("/somedir/somefile", 0755);  
?>	

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
         "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Language" content="en-gb">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<!--<link rel="stylesheet" href="../Stylesheets/ATT2010.css" type="text/css" media="screen">-->
<!-- <link rel="shortcut icon" href="/favicon.ico"/> -->
<title>All-in-one Upload</title>

<style>
<!-- Additional Style changes -->
</style>
</head>
<body class = "upload">

<h2> File uploading results </h2>

<?php
printf("<br>Report Headline    : %s<br>",$UserTitle);
printf("Report Sub Heading : %s<br>",$UserSub);

//Upload code for file 1 (userfile )
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
/*********************************************************************************/
// Upload code for file 2 (imagefile)
if ($_FILES["imagefile"]["error"] > 0)
	{
  	$Image_Err = $_FILES["imagefile"]["error"];
  	echo "Error: " . $Image_Err . "<br />";
  		if ($Image_Err = 2){ echo "Image File too large <br />"; }
		if ($Image_Err = 4){ echo "No Image File Selected <br />"; }
	}
else
  {
  echo "Image file details :<br>";
  echo "File selected : " . $_FILES["imagefile"]["name"] . " ";
  // echo "Type: " . $_FILES["imagefile"]["type"] . " ";
  //echo "Size: " . ($_FILES["imagefile"]["size"] / 1024) . " Kb<br />";
  //echo "Stored in: " . $_FILES["imagefile"]["tmp_name"];
  }
// Restrict file types and sizes
// no support for GIFs ($_FILES["imagefile"]["type"] == "image/gif") || 
if ((($_FILES["imagefile"]["type"] == "image/jpeg")
|| ($_FILES["imagefile"]["type"] == "image/pjpeg"))
&& ($_FILES["imagefile"]["size"] < 1024*1024*6))
{//1
  if ($_FILES["imagefile"]["error"] > 0)
    {
    echo "Incorrect image file format encountered.<br>";
    //echo "Return Code: " . $_FILES["imagefile"]["error"] . "<br />";
	$Image_Err = 3;
    }
  else
    { //2
    echo "Image file of correct type <br>";
    //echo "Upload: " . $_FILES["imagefile"]["name"] . "<br />";
    //echo "Type: " . $_FILES["imagefile"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["imagefile"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["imagefile"]["tmp_name"] . "<br />";    
    
	if (file_exists($Target_root2 . $_FILES["imagefile"]["name"]))
      {
      echo "Image file " . $_FILES["imagefile"]["name"] . " already exists. ";
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

      // move_uploaded_file($_FILES["imagefile"]["tmp_name"], $Target_root2 . $_FILES["imagefile"]["name"]);
      	//echo "Stored in: " . $Target_root2 . $_FILES["imagefile"]["name"]. "<br />";
	  	imagedestroy($src);
		imagedestroy($tmp); 
	  }

    }//2
	
}//1
else
{
  echo "<br/>Invalid image file<br />";
}

//Files have been copied across.
//Now to update the database file
/*
Structure of the file is
String Reference - i.e. ATT001
String Headline - i.e. Round 1 Bracken Rocks
String Subheading - i.e. Ace Rider takes the honours in open event.
String Userfile - i.e. British Round 1.txt
String ImageFile - i.e. IMG0435.JPG

*/
$Datafile = $Target_root . "Data/ReportsList.dat";
$DataTitle = $UserTitle;
$DataSubtitle = $UserSub;
$DataUserFile = $UserFile;
$DataImageTitle = $ImageTitle;
$DataImageFile = $Original_Image;
$UploadDate = date("d.m.y");
                         	
if (!file_exists( $Datafile ) )
	{
	echo "<br/>Data File not found, new one created<br />";
	$Reference = "ATT001";  //New database so set numbers to start
	$fp = fopen( $Datafile, 'w' );
	fwrite ( $fp, "$Reference,$DataTitle,$DataSubtitle,$DataUserFile,$DataImageTitle,$DataImageFile,$UploadDate\n" );
	fclose($fp);
	}
	else
	{
	echo "<br/>Data File found, current one used<br />";
	$Reference = sprintf("ATT%03d", CountRecords( $Datafile ) + 1);
	$fp = fopen( $Datafile, 'a' );
	fwrite ( $fp, "$Reference,$DataTitle,$DataSubtitle,$DataUserFile,$DataImageTitle,$DataImageFile,$UploadDate\n" );
	fclose($fp);
	ReverseDataFile( $Datafile );
	}
echo "Reports List updated"
?>

</body>
</html>