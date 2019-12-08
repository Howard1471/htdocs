<?php
	global $Reference,$DataTitle,$DataSubtitle,$DataUserFile,$DataImageTitle,$DataImageFile,$UploadDate,$LiveData;
	global $HostSite, $DetailFile, $CommentFile, $TestimonialFile;
	global $Target_root, $Target_root1, $Target_root2;
	global $Line_Array, $Line_Counter, $SubmitFlag;

$Host_Root = "/home/www/mhn-ltd.com";
$Target_root = "";
$Target_root1 = $Target_root . "Data/";
$Target_root2 = $Target_root . "Files/";
$DetailFile = $Target_root1."ReportsList.dat";
$FilePrefix =  "MHN";
$Line_Array = array();
$SubmitFlag =0;

function GetDataRecords()
{
	global $Reference,$DataTitle,$DataSubtitle,$DataUserFile,$DataImageTitle,$DataImageFile,$UploadDate,$LiveData;
	global $HostSite, $DetailFile, $CommentFile, $TestimonialFile;
	global $Target_root, $Target_root1, $Target_root2;
	global $Line_Array, $Line_Counter;
//Get all the details into the global array
$fp = fopen(  $DetailFile, "r" );
$Line_Array[] = fgets($fp, 1024 );
$Line_Counter = 1;
while ( !feof($fp) )
	{ 
	$Line_Array[] = fgets($fp, 1024 );
	$Line_Counter++;
	}
fclose($fp);
}

function Dataprocessing()
{	
//Get all the values and put them back into a details file ( Details2.dat for testing )
	global $Reference,$DataTitle,$DataSubtitle,$DataUserFile,$DataImageTitle,$DataImageFile,$UploadDate,$LiveData;
	global $HostSite, $DetailFile, $CommentFile, $TestimonialFile;
	global $Target_root, $Target_root1, $Target_root2;
	global $Line_Array, $Line_Counter;

$Line_Counter = $_POST['LineCount'];
//echo '<br>Data Proocessing.<br>';
//echo 'Line_Counter : '.$Line_Counter. '<br>';

//$DetailFile = $Target_root1."Details2.dat";
if ( file_exists( $DetailFile) ) { unlink($DetailFile); }
$fp = fopen( $DetailFile , 'w' );
for ( $loop1 = 1 ; $loop1 < $Line_Counter ; $loop1++ )
	{
	$CtrlNum = $loop1;
	$Reference = $_POST['txtRef'.$CtrlNum];
	$DataTitle =  $_POST['txtTitle'.$CtrlNum];
	$DataSubtitle =  $_POST['txtSub'.$CtrlNum];
	$DataUserFile =  $_POST['txtUserFile'.$CtrlNum];
	$DataImageTitle =  $_POST['txtImageTitle'.$CtrlNum];
	$DataImageFile =  $_POST['txtImageFile'.$CtrlNum];
	$UploadDate =  $_POST['txtUpload'.$CtrlNum];
	$LiveData =   $_POST['txtLive'.$CtrlNum];
	 if ($LiveData == "on") { $LiveData = "on";} else { $LiveData = "off";}
	$line = $Reference.','.$DataTitle.','.$DataSubtitle.",".$DataUserFile.",".$DataImageTitle.",".$DataImageFile.','.$UploadDate.','.$LiveData.','."\n";
	fwrite ( $fp, $line );
	}

fclose($fp);
$SubmitFlag = 0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <link rel="stylesheet" href="../stylesheets/Childcare.css" type="text/css" media="screen"> -->
<!-- <link rel="shortcut icon" href="/favicon.ico"/> -->
<title>Thank You</title>
<script type="text/javascript">  
function RefreshWindow()  
{
window.location.reload() ;
}  
</script>
 
</head>
<body ><!-- Very dirty but effective onload="RefreshWindow();" -->
</body>
</html>
<?


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


function mainform()
{
	global $Reference,$DataTitle,$DataSubtitle,$DataUserFile,$DataImageTitle,$DataImageFile,$UploadDate,$LiveData;
	global $HostSite, $DetailFile, $CommentFile, $TestimonialFile;
	global $Target_root, $Target_root1, $Target_root2;
	global $Line_Array, $Line_Counter;
	GetDataRecords();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../stylesheets/Childcare.css" type="text/css" media="screen">

<title>Edit List</title>
<style type="text/css">
input { font-size:10px ; font:"Arial, Helvetica, sans-serif";}
</style> 
</head>

<body class="Editlist">
<form action="<? echo($PHP_SELF) ?>" method="POST" style="text-align: left">

<?
for ( $loop1 = 1; $loop1 < $Line_Counter; $loop1++ )
	{
	$string_array = explode( ",", $Line_Array[$loop1 - 1] );
	$Reference = $string_array[0];
	$DataTitle = $string_array[1];
	$DataSubtitle = $string_array[2];
	$DataUserFile = $string_array[3];
	$DataImageTitle = $string_array[4];
	$DataImageFile = $string_array[5];
	$UploadDate = $string_array[6];
	$LiveData = trim( $string_array[7] );	
	//ErrorMsg( '>'.$Line_Array[$loop1 - 1].'<' );	
		
		$CtrlNum = $loop1;
		echo '<TABLE width="675px" border="1" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF"">';
		echo '<tr>';
		echo '<td width="100px">Title:</td>';
		echo '<td width="348px"><input type="text" maxlength="40" size="70" id="txtTitle" name="txtTitle'.$CtrlNum.'" value="'.$DataTitle.'"></td>';
		if ($LiveData == "on") {
		echo '<td width="165px">&nbsp;Live Report : <input type="checkbox" name="txtLive'.$CtrlNum.'" CHECKED ></td></tr>';
		} else {
		echo '<td width="165px">&nbsp;Live Report : <input type="checkbox" name="txtLive'.$CtrlNum.'" ></td></tr>';
		}
		echo '<tr>';
		echo '<td width="100px">Subtitle:</td>';
		echo '<td colspan="2">';
		echo '<input type="text" maxlength="80" size="120" id="txtSub" name="txtSub'.$CtrlNum.'" value="'.$DataSubtitle.'" ></td></tr>';
		echo '<td width="100px">Photo title:</td>';
		echo '<td colspan="2">';
		echo '<input type="text" maxlength="80" size="120" id="txtImageTitle" name="txtImageTitle'.$CtrlNum.'" value="'.$DataImageTitle.'" ></td></tr>';
		echo '</TABLE>';
		echo '<br>';
		echo '<input type="hidden" name="txtRef'.$CtrlNum.'" value="'.$Reference.'" >';
		echo '<input type="hidden" name="txtUserFile'.$CtrlNum.'" value="'.$DataUserFile.'" >';
		echo '<input type="hidden" name="txtImageFile'.$CtrlNum.'" value="'.$DataImageFile.'" >';
		echo '<input type="hidden" name="txtUpload'.$CtrlNum.'" value="'.$UploadDate.'" >';
		
	}
	echo '<input type="hidden" name="LineCount" value="'.$Line_Counter.'" >';
	$SubmitFlag = 1;
	echo '<input type="hidden" name="SubmitFlag" value="'.$SubmitFlag.'" >';
?>	
<table width="675px" border="1" cellspacing="0" cellpadding="0">
<tr><td align="center"><input type="submit" value="Submit" name="submit" /></td></tr></table>
</form>
</body>
</html>
<?
}
/**********************************************************************************************************************/
/***** MAIN *****/
// test for $submit and validate the form
// On entry simply display the form.
// isset( $_POST['submit']) catches refreshed pages

if ( (isset($_POST['submit'])) and ($_POST['SubmitFlag'] == 1) )
{
//ErrorMsg( "Submit button detected");
// process data
DataProcessing();
Mainform();
}
else {
Mainform();
}
?>
