<?php

//if (file_exists ( "localhost.txt" )) {
//$Target_root = "e:\web\htdocs\acetrialsteam.co.uk/News/";
//}else{
//$Target_root = "/home/www/acetrialsteam.co.uk/News/";
//}
$Target_root = "";
$Target_root1 = $Target_root . "Report/";
$Target_root2 = $Target_root . "images/";
$Target_root3 = $Target_root . "Data/";
$Target_root4 = $Target_root . "html/";
$Report_Err = 0;
$Image_Err =0;
$newwidth=400; // New Landscape picture width
$Datafile = $Target_root3 . "ReportsList.dat";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Delete Document</title>
<link href="../Upload/Stylesheets/ATT2010.css" rel="stylesheet" type="text/css" />
</head>
<body class = "Doclist">
<?
//Open the docslist file
//echo "File opened <br>";
$fp = fopen(  $Datafile, "r" );
$DataStr = fgets($fp, 1024 );
while ( !feof($fp) )
	{ 
	$string_array = explode( ",", $DataStr );
	$Record_Number = $string_array[0];
	$Record_Headline = $string_array[1];
	$Record_Subheading = $string_array[2];
	$Record_TXTFilename = $string_array[3];
	$Record_PhotoFilename = $string_array[5];
	$Record_PhotoTitle = $string_array[4];
	$Record_UploadDate = $string_array[6];
	$File_Contents = file_get_contents( $Target_root1 . $Record_TXTFilename );
	$Temp_Str =  substr($File_Contents,0,80); 
//List the docs on the window

	//printf( 'Record Reference is %s Record Headline is %s<br>', $Record_Number, $Record_Headline);
	printf( '<a class = "Newslist" href="DeleteReport.php?reference=%s "', $Record_Number );
	printf( 'target="_parent" title="Delete this report"');
	printf( '>%s</a>', $Record_Headline);

	printf( '<h1 class = "Italic" >%s Uploaded - %s</h1>',$Record_Number, $Record_UploadDate); 
	printf( '<h1 class = "doclist" >%s</h1>', $Record_Subheading);
	//printf( '<h1>%s.......</h1>',$Temp_Str);
/*	echo '<br />';
*/
	$DataStr = fgets($fp, 1024 );
	}

fclose($fp);
//echo "File Closed";
?>

</body>
</html>
