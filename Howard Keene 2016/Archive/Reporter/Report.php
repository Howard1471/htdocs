<?php
$Target_root = "";
$Target_root1 = $Target_root . "Reports/";
$Target_root2 = $Target_root . "images/";
$Target_root3 = $Target_root . "Data/";
//$Target_root4 = $Target_root . "html/";
$Report_Err = 0;
$Image_Err =0;
$newwidth=600; // New Landscape picture width
$Datafile = $Target_root3 . "ReportsList.dat";
$Flag_Var = false;

$Target_Ref = $_GET['reference'];
//include( "Doc2Txt.php" );
//include( "rtf2Txt.php" );
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Report View</title>
<link href="Stylesheets/Reporter.css" rel="stylesheet" type="text/css" media="screen">

</head>
<body class = "Report">
<?
//echo "File opened <br>";
$fp = fopen(  $Datafile, "r" );
$DataStr = fgets($fp, 1024 );
while ( !feof($fp) )
	{ 
	$string_array = explode( ",", $DataStr );
	$Record_Number = $string_array[0];
	if ( $string_array[0] == $Target_Ref )
		{
		$Flag_Var = true;
		$Record_Headline = $string_array[1];
		$Record_Subheading = $string_array[2];
		$Record_TXTFilename = $string_array[3];
		$Record_PhotoTitle = $string_array[4];
		$Record_PhotoFilename = $string_array[5];
		$Record_UploadDate = $string_array[6];
		$File_Contents = file_get_contents( $Target_root1 . $Record_TXTFilename );
		$Temp_Str =  substr($File_Contents,0,80); 
		}
	$DataStr = fgets($fp, 1024 );
	}
fclose($fp);

if ( $Flag_Var )
	{
	$ImageFile = $Target_root2 . $Record_PhotoFilename;
	$File_Contents = nl2br(file_get_contents( $Target_root1 . $Record_TXTFilename ));
	}
?>
<table width = 600  align="center">
<p class="Title"><? echo $Record_Headline; ?></h3>
<P class="subtitle"><? echo $Record_Subheading; ?></h2>
<p align="center">
<?
if ($Record_PhotoFilename != "" ){ ?>
<img src="<? echo $ImageFile; ?>" border="1" height="450" width="600"/><br />
<? echo $Record_PhotoTitle; }?>
</p>
<h1><? echo $File_Contents; ?></h1>
</table>
</body>
</html>
