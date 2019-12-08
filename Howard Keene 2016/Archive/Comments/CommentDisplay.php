<?php
$File_Reference = $_GET['reference']; //XXXnnn
include ( "Comments_Include.php" );



function GetAndDisplay()
{
global $NameData, $FromData, $TelData ,$EmailData, $TitleData, $CommentData, $FilePrefix, $UploadData;
global $HostSite, $DetailFile, $File_Reference, $TestimonialFile;
global $Target_root, $Target_root1, $Target_root2;


$fp = fopen( $DetailFile, 'r' );
$DataStr = fgets($fp, 1024 );
while ( !feof($fp) )
	{ 
	$string_array = explode( ",", $DataStr );
	$Prefix_Number = $string_array[0];
	if ( $Prefix_Number == $File_Reference )
		{
		$TitleData = $string_array[1];
		$NameData = $string_array[2];
		$FromData = $string_array[3];
		$TelData = $string_array[4];
		$EmailData = $string_array[5];
		$UploadData = $string_array[6];
		}
		$DataStr = fgets($fp, 1024 );
	}
fclose($fp);
$CommentData = File_Get_Contents( $Target_root2.$File_Reference.'.txt');

}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
         "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Language" content="en-gb">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<!--<link rel="stylesheet" href="../stylesheets/Childcare.css" type="text/css" media="screen">-->
<!--<link rel="shortcut icon" href="/favicon.ico"/>-->
<title>The Manor House Nursery</title>
<style type="text/css">
<!-- Additional Style changes -->
#content2 { float:none; padding:10px; width:700px; height:100%;  border:solid 0px;}
td.p1 { text-align:left;  font-family:"Comic Sans MS" ; font-size:12pt; font-weight:normal; margin:0 0 5px 0; color:#000000; border:solid 0px; }
td.p2 { text-align:left;  font-family:"Comic Sans MS" ; font-size:12pt; font-weight:normal; margin:5px 5px 5px 5px; color:#000000; border:solid 0px; background-color:#FFF; padding: 5px ; }
</style>

</head>
<body>
<? GetAndDisplay(); ?>
<div id="wrap">
<div id="logodiv1"></div>
<div id="header">
<h1>The Manor House Nursery</h1>
<h4>Church Street, Eckington, Derbyshire, S21 4BG</h4>
</div>
<!-- Spare division for alternate use -->
<div id="shelfdiv1"></div>

<div id="spacer1"></div>
<div id="Navbar">
</div>
<!-- Main Content -->
<div id="content2">
<!-- Page Content -->

<table width="900px" height="350px" border="0" cellpadding="0" cellspacing="0">
<tr>
<td class="p1"> Name: <? echo $NameData ;?> from: <? echo $FromData ; ?></td>
</tr>
<tr height="300px">
<td class="p2" valign="top">

<? echo $CommentData ; ?></td>
</tr> 
    
</table>    
  <!-- End of page Content -->
</div>
</div>
<div id="footer">
<p>Site created by <a href="http://www.softbackwebsites.com" target="_blank">Softback Websites</a> </p>
</div>

</body>
</html>