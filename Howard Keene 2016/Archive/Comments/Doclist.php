<?php
	global $NameData, $FromData, $TelData ,$EmailData, $TitleData, $CommentData, $FilePrefix, $UploadData,$LiveData;
	global $HostSite, $DetailFile, $CommentFile, $TestimonialFile;
	global $Target_root, $Target_root1, $Target_root2;
//if (file_exists ( "localhost.txt" )) {
//$Target_root = "e:\web\htdocs\acetrialsteam.co.uk/News/";
//}else{
//$Target_root = "/home/www/acetrialsteam.co.uk/News/";
//}
$Host_Root = "/home/www/howardkeene.co.uk";
$Target_root = "";
$Target_root1 = $Target_root . "Data/";
$Target_root2 = $Target_root . "Files/";
$DetailFile = $Target_root1."Details.dat";
$CommentFile = $Target_root1."Comments.dat";
$FilePrefix =  "HMK";

function ErrorMsg( $StrMessage )
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Not Applicable</title>

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
<!--<link href="../stylesheets/Childcare.css" rel="stylesheet" type="text/css" />-->
<link rel="stylesheet" href="js/thickbox.css" type="text/css" media="screen" />
<script type="text/javascript">
<!--
function popup(url) 
{
 var width  = 1000;
 var height = 600;
 var left   = (screen.width  - width)/2;
 var top    = (screen.height - height)/2;
 var params = 'width='+width+', height='+height;
 params += ', top='+top+', left='+left;
 params += ', directories=no';
 params += ', location=no';
 params += ', menubar=no';
 params += ', resizable=no';
 params += ', scrollbars=no';
 params += ', status=no';
 params += ', toolbar=no';
 newwin=window.open(url,'windowname5', params);
 if (window.focus) {newwin.focus()}
 return false;
}
// -->
</script>

<!--
<script type="text/javascript" src="js/jquery-latest.js"></script> 
<script type="text/javascript" src="js/thickbox.js"></script>
<style type="text/css">
a {  font-family:"Comic Sans MS" ; font-size:14pt; font-style: normal; font-weight:Bold;;margin:0 0 5px 0; color:#0000CC; }
</style>
-->

</head>

<body class = "Doclist">
<?
// Data format in details file
//$line = $Prefix_Number.','.$TitleData.','.$NameData.",".$FromData.",".$TelData.",".$EmailData.','.$UploadData.','.$LiveData.','."\n";
//echo "File opened <br>";
$fp = fopen(  $DetailFile, "r" );
$DataStr = fgets($fp, 1024 );
while ( !feof($fp) )
	{ 
	$string_array = explode( ",", $DataStr );
	$Prefix_Number = $string_array[0];
	$TitleData = $string_array[1];
	$NameData = $string_array[2];
	$FromData = $string_array[3];
	$TelData = $string_array[4];
	$EmailData = $string_array[5];
	$UploadData = $string_array[6];
	$LiveData =  $string_array[7];

	//<a href="javascript: void(0)" onclick="popup('AddComments.php')">
	//printf( '<a class = "Newslist" href="javascript: void(0)" onclick="popup( $HyperlinkStr )"';
	//printf( 'Record Reference is %s Record Headline is %s<br>', $Record_Number, $Record_Headline);
	//printf( '<a class = "Newslist" href="CommentDisplay.php?reference=%s "', $Prefix_Number );

//<a class="thickbox" href="AddComments.php?TB_iframe=true&height=346&width=640" title="Please complete the form below and click Submit" >Please Click Here</a>
/*	if ( $LiveData == "*" ) {
		$HyperlinkStr = sprintf("CommentDisplay.php?reference=%s ", $Prefix_Number);
		printf('<a target="_blank" class="thickbox" href="'.$HyperlinkStr.'&TB_iframe=true&height=600&width=1000" title="Please complete the form below and click Submit" >%s</a>',$TitleData);
		printf( '<h6 class = "Italic" >Uploaded - %s by %s<br><br>', $UploadData, $NameData." from ".$FromData);
		}
*/		
	if ( $LiveData == "*" ) {
		$HyperlinkStr = sprintf("CommentDisplay.php?reference=%s ", $Prefix_Number);
		printf( '<a class = "Newslist" href="javascript: void(0)" onclick="popup(\''.$HyperlinkStr.'\')"') ;
		printf( 'target="_blank" title="Read this Testimonial"');
		printf( '">%s</a>', $TitleData);
		printf( '<h6 class = "Italic" >Uploaded - %s by %s<br><br>', $UploadData, $NameData." from ".$FromData);
		}
	
//printf( '<h6 class = "doclist" >%s</h6>', $NameData." From ".$FromData);
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
