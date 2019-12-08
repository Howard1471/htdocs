<?php
// This page displays the news report
$Target_root = "";
$Target_root1 = $Target_root . "Report/";
$Target_root2 = $Target_root . "images/";
$Target_root3 = $Target_root . "Data/";
$Target_root4 = $Target_root . "html/";
$Report_Err = 0;
$Image_Err =0;
$newwidth=400; // New Landscape picture width
$Datafile = $Target_root3 . "ReportsList.dat";
$NewDataFile = $Target_root3 . "NewDataFile.dat";
$Flag_Var = false;
$Target_Ref = $_GET['reference'];



$fpOld = fopen(  $Datafile, "r" );
$fpNew = fopen(  $NewDataFile, "w" );
//Pre Read
$TestData = "None"
$DataStr = fgets($fpOld, 1024 );
while ( !feof($fpOld) )
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

	If ( $Record_Number != $Target_Ref )
		{ fwrite ( $fpNew, $DataStr );}
		
	$DataStr = fgets($fpOld, 1024 );
	}

fclose($fpOld);
fclose($fpNew);
Unlink ( $Datafile );
rename ( $NewDataFile, $DataFile );
//echo "File Closed";



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/MainV2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="DESCRIPTION" content="The Ace Trials Team website offers all you need to know about the only British Trials Team and more!" />
<meta name="keywords" content="Ace Trials Team,Motorcycles,Trials,Sherco,montessa,honda,beta,gas gas,scorpa,dunlop,michelin,MRS,Ace trials team,World,European, British, Ace">
<meta name="verify-v1" content="+NSjMDpr4VFJmngIP/0UcWXZZChMYG32q8orLl6u4as=" />
<meta name="revisit-after" CONTENT="15 days">
<link rel="stylesheet" href="../../Upload/NewsFolder/Stylesheets/ATT2010.css" type="text/css" media="screen">
<link rel="shortcut icon" href="/favicon.ico"/>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Ace Trials Team 2010</title>
<!-- InstanceEndEditable -->
<style>
<!-- Additional Style changes -->
</style>

<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>
<body>

<div id = "wrap">
<div id = "header">
<img src="../../Upload/NewsFolder/images/AceHeader.gif" width="1000" height="150" />
  <!-- InstanceBeginEditable name="Header" -->  <!-- InstanceEndEditable --></div>
<div id="Box1">
<h1 class="Box1">
<a href= "../../Upload/NewsFolder/index.php">Home</a>
  <!-- InstanceBeginEditable name="Pathlist" -->
  &gt; <a href="../../Upload/NewsFolder/Archive/ReportList.html" title="News Reports List">News List</a> > News Report
  <!-- InstanceEndEditable -->
</h1>  
  
  </div>
<div id = "menu_frame">

<div id = "Menu_Top">
  <!-- InstanceBeginEditable name="MenuHeader" -->
  
  <!-- InstanceEndEditable -->
</div>
<div id = "Menu_Mid">
<!-- InstanceBeginEditable name="Main_Menu" -->


<!-- InstanceEndEditable -->
</div><!-- End of menu mid -->
<div id = "Menu_Bot"></div>
</div><!-- End of menu frame -->
<div id="Main_Content">
<!-- InstanceBeginEditable name="Main_Content" -->
<iframe width = 700 height = 350 frameborder="no" align= left align = top marginheight = "0" marginwidth="0"
src="Report.php?reference=<? echo $Target_Ref ;?>" name="F1" scrolling="auto"></iframe>

<!-- InstanceEndEditable --></div>
<!-- end of Main Content -->
<div id="footer"></div>
</div> <!-- End of wrap -->


</body>
<!-- InstanceEnd --></html>
