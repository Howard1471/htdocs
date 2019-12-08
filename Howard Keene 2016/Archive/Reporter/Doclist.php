<?php

$Host_URL="";
$Target_root = "";
$Target_root1 = $Target_root . "Reports/";
$Target_root2 = $Target_root . "images/";
$Target_root3 = $Target_root . "Data/";
//$Target_root4 = $Target_root . "html/";
$Report_Err = 0;
$Image_Err =0;
$newwidth=400; // New Landscape picture width
$Datafile = $Target_root3 . "ReportsList.dat";

function CountLiveDataRecords( $Detailsfile )
{
$fp = fopen(  $Detailsfile, "r" );
//$DataStr = fgets($fp, 1024 );
$Line_Counter = 0;
while ( !feof($fp) )
	{ 
	$DataStr = fgets($fp, 1024 );
	$string_array = explode( ",", $DataStr );
	//ErrorMsg ( $DataStr."<br> >".trim( $string_array[7] )."< <br>");
	if ( trim( $string_array[7] ) == "on" ) { $Line_Counter++; }
	}
fclose($fp);
return $Line_Counter;
}
function ErrorMsg( $StrMessage )
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MartinGNaylor</title>

</head>
<body>
<p>Message : <? echo $StrMessage; ?></p>
</body>
</html>
<?
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="Stylesheets/Reporter.css" rel="stylesheet" type="text/css" media="screen">
<style type="text/css">
</style>
<script type="text/javascript">
<!--
function popup(url) 
{
 var width  = 800;
 var height = 700;
 var left   = (screen.width  - width)/2;
 var top    = (screen.height - height)/2;
 var params = 'width='+width+', height='+height;
 params += ', top='+top+', left='+left;
 params += ', directories=no';
 params += ', location=no';
 params += ', menubar=no';
 params += ', resizable=no';
 params += ', scrollbars=yes';
 params += ', status=no';
 params += ', toolbar=no';
 newwin=window.open(url,'windowname5', params);
 if (window.focus) {newwin.focus()}
 return false;
}
// -->
</script>
</head>
<body class = "Doclist">
<?
//echo "File opened <br>";
if ( !file_exists( $Datafile ) )
{
	touch( $Datafile );
	$Record_Count = 0;
} else {
//ErrorMsg( 'Data File : '.$Datafile );
$Record_Count = CountLiveDataRecords( $Datafile );	

}

if ( $Record_Count > 0 )
{
	
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
	$Record_LiveData = $string_array[7];
	//$File_Contents = file_get_contents( $Target_root1 . $Record_TXTFilename );
	//$Temp_Str =  substr($File_Contents,0,80); 

	if ( trim( $Record_LiveData ) == "on" ) 
		{
		$HyperlinkStr = sprintf("Report.php?reference=%s ", $Record_Number );
		printf( '<a class = "Newslist" href="javascript: void(0)" onclick="popup(\''.$HyperlinkStr.'\')"') ;
		printf( 'target="_parent" title="Read this report"');
		printf( '">%s</a>', $Record_Headline);
		printf( '<p class = "subtitle" >%s</p>', $Record_Subheading);
		printf( '<p class = "Italic" >Uploaded - %s</p><br>', $Record_UploadDate); 
		}
	
	$DataStr = fgets($fp, 1024 );
	}

	fclose($fp);
} 
else 
{
	printf( '<p class = "Italic"> There are currently no Activity Reports</p>' );
}

?>

</body>
</html>

		