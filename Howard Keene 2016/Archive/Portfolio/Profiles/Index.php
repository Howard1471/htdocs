<?php
$Layoutflag = 1;
$Username = "Frances Emily Keene";
$Usertitle = "Performing Arts Student";
$BodyColour = "#000";



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo $Username ; ?></title>
<link href="../Stylesheets/Style1.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<style type="text/css" >
Body {background-color:<? echo $BodyColour; ?>;}

</style>

<body>
 <div id="wrap">
 
 <!-- Two divs, this is the first. Left hand column -->
<?
if ( $Layoutflag == 1 ){ ?>
<div id="Column1">
<!--<img width="187px" height="250px" src="images/main1.jpg" />-->
</div>
<? } ?>
<div id="Bannerl">
	<div id="header">
	<h1>Frances Emily Keene</h1>
	</div>
	<div id="SubHeader">
	<h3>Performing Arts Student</h3>
	</div>
</div>
<?
if ( $Layoutflag == 2 ){ ?>
<div id="Column1">
<!--<img width="187px" height="250px" src="images/main1.jpg" />-->
</div>
<? } ?>



<div id="Column2">
<div id="Tabs">
<table width="625px" border="0" cellpadding="0" cellspacing="0"><tr>
<td height="30" width="125px"><a href="aboutme.php" target="F1">About Me</a></td>
<td height="30" width="125px"><a href="resume.php" target="F1">Resum&eacute;</a></td>
<td height="30" width="125px"><a href="../gallery.html" target="F1">Photos</a></td>
<td height="30" width="125px"><a href="../contactme.html" target="F1">Contact Me</a></td>
<td height="30" width="125px">&nbsp;</td>
</tr></table>
</div><!-- End of Tabs -->
<div id="content">
<iframe width="900px" height="475px" scrolling="auto" frameborder="1" name="F1" src="aboutme.php" align="middle" valign = "top" marginheight = "0" marginwidth="0" />
Column2-Edit 
</div><!-- End of Content-->


</div> <!-- End of Wrap -->
</body>
</html>
