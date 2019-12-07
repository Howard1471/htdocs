<?php
	global $NameData, $FromData, $TelData ,$EmailData, $TitleData, $CommentData, $FilePrefix, $UploadData,$LiveData;
	global $HostSite, $DetailFile, $CommentFile, $TestimonialFile;
	global $Target_root, $Target_root1, $Target_root2;
	global $Line_Array, $Line_Counter, $SubmitFlag;
//if (file_exists ( "localhost.txt" )) {
//$Target_root = "e:\web\htdocs\acetrialsteam.co.uk/News/";
//}else{
//$Target_root = "/home/www/acetrialsteam.co.uk/News/";
//}
$Host_Root = "/home/www/mhn-ltd.com";
$Target_root = "";
$Target_root1 = $Target_root . "Data/";
$Target_root2 = $Target_root . "Files/";
$DetailFile = $Target_root1."Details.dat";
$CommentFile = $Target_root1."Comments.dat";
$FilePrefix =  "MHN";
$Line_Array = array();
$SubmitFlag =0;

function GetDataRecords()
{
	global $NameData, $FromData, $TelData ,$EmailData, $TitleData, $CommentData, $FilePrefix, $UploadData,$LiveData;
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
/*
	$string_array = explode( ",", $DataStr );
	$Prefix_Number = $string_array[0];
	$TitleData = $string_array[1];
	$NameData = $string_array[2];
	$FromData = $string_array[3];
	$TelData = $string_array[4];
	$EmailData = $string_array[5];
	$UploadData = $string_array[6];
	$LiveData =  $string_array[7];
*/
}
function Dataprocessing()
{	
//Get all the values and put them back into a details file ( Details2.dat for testing )
	global $NameData, $FromData, $TelData ,$EmailData, $TitleData, $CommentData, $FilePrefix, $UploadData,$LiveData;
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
	$Prefix_Number = $_POST['txtPrefix'.$CtrlNum];
	$TitleData =  $_POST['txtTitle'.$CtrlNum];
	$NameData =  $_POST['txtName'.$CtrlNum];
	$FromData =  $_POST['txtFrom'.$CtrlNum];
	$TelData =  $_POST['txtTel'.$CtrlNum];
	$EmailData =  $_POST['txtEmail'.$CtrlNum];
	$UploadData =  $_POST['txtUpload'.$CtrlNum];
	$LiveData =   $_POST['txtLive'.$CtrlNum];
	 if ($LiveData == "on") { $LiveData = "*";} else { $LiveData = "-";}
	$line = $Prefix_Number.','.$TitleData.','.$NameData.",".$FromData.",".$TelData.",".$EmailData.','.$UploadData.','.$LiveData.','."\n";
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
	global $NameData, $FromData, $TelData ,$EmailData, $TitleData, $CommentData, $FilePrefix, $UploadData,$LiveData;
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
</head>
<body class="Editlist">
<form action="<? echo($PHP_SELF) ?>" method="POST" style="text-align: left">
<?
for ( $loop1 = 1; $loop1 < $Line_Counter; $loop1++ )
	{
	$string_array = explode( ",", $Line_Array[$loop1 - 1] );
	$Prefix_Number = $string_array[0];
	$TitleData = $string_array[1];
	$NameData = $string_array[2];
	$FromData = $string_array[3];
	$TelData = $string_array[4];
	$EmailData = $string_array[5];
	$UploadData = $string_array[6];
	$LiveData =  $string_array[7];	
		
		
		$CtrlNum = $loop1;
		echo '<TABLE width="675px" border="1" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF"">';
		echo '<tr>';
		echo '<td width="40">Title:</td><td colspan="2">';
		echo '<input type="text" maxlength="50" size="40" id="txtTitle" name="txtTitle'.$CtrlNum.'" value="'.$TitleData.'"></td>';
		if ($LiveData == "*") {
		echo '<td>Live Comment : <input type="checkbox" name="txtLive'.$CtrlNum.'" CHECKED ></td></tr>';
		} else {
		echo '<td>Live Comment : <input type="checkbox" name="txtLive'.$CtrlNum.'" ></td></tr>';
		}
		echo '<tr>';
		echo '<td width="40">Name:</td><td width="200px">';
		echo '<input type="text" maxlength="30" size="30" id="txtName" name="txtName'.$CtrlNum.'" value="'.$NameData.'" ></td>';
		echo '<td width="40">From:</td><td width="200px">';
		echo '<input type="text" maxlength="30" size="30" id="txtFrom" name="txtFrom'.$CtrlNum.'"  value="'.$FromData.'"></td>';
		echo '</tr><tr>';
		echo '<td width="40">Tel:</td><td width="200px">';
		echo '<input type="text" maxlength="20" size="20" id="txtTel" name="txtTel'.$CtrlNum.'" value="'.$TelData.'" ></td>';
		echo '<td width="40">Email:</td><td width="200px">';
		echo '<input type="text" maxlength="50" size="30" id="txtEmail" name="txtEmail'.$CtrlNum.'"  value="'.$EmailData.'"></td>';
		echo '</tr>';
		echo '</TABLE>';
		echo '<br>';
		echo '<input type="hidden" name="txtPrefix'.$CtrlNum.'" value="'.$Prefix_Number.'" >';
		echo '<input type="hidden" name="txtUpload'.$CtrlNum.'" value="'.$UploadData.'" >';
		
	}
	echo '<input type="hidden" name="LineCount" value="'.$Line_Counter.'" >';
	$SubmitFlag = 1;
	echo '<input type="hidden" name="SubmitFlag" value="'.$SubmitFlag.'" >';
?>	
<table width="675px" border="1" cellspacing="0" cellpadding="0">
<tr><td align="center"><input type="submit" value="Submit" name="submit" /></td></tr></table>

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
