<?php
//File uploading code
global $UserTitle;

$UserTitle = $_POST['Albumname'];
//$UserSub = $_POST['subtitle'];
//$ImageTitle = $_POST['phototitle'];

//Max 10 files to transfer
$loop1;
//$Target_root = "www.vickidurning.com\\";

//include all the standard functions
include( "Gallery_Functions.php" );
//chmod("/somedir/somefile", 0755); 
 
?>	

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
         "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Language" content="en-gb">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" href="Stylesheets/Style1.css" type="text/css" media="screen">
<!-- <link rel="shortcut icon" href="/favicon.ico"/> -->
<title>All-in-one Upload</title>

<style>
<!-- Additional Style changes -->
</style>
</head>
<body>

<h2> File uploading results </h2>

<?php
echo  "Post Max Size is ", ini_get('post_max_size');
//printf("<br>Report Headline    : %s<br>",$UserTitle);
//printf("Report Sub Heading : %s<br>",$UserSub);
echo " Album name is : ".$UserTitle. "<br><br>";
if ( !file_exists($Target_root3 . $UserTitle) )
	{
	echo "Album does not exist. ";
	CreateNewAlbum( $UserTitle );
	//echo "Folder tree created.<br />";	
	}
	else
	{
	echo "Album already exists, files will be added to this Album.<br />";
	}


for ($loop1=0 ; $loop1 <= 9; $loop1++ )
	{
	if ($_FILES['imagefile']['name'][ $loop1] != "") {
		printf("Imagefile 1: %s<br>",$_FILES['imagefile']['name'][ $loop1]);
		UploadSingleImage ( $loop1 );  }
	}
printf("Report Complete ");

/*********************************************************************************/


?>

</body>
</html>