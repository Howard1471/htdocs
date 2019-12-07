<?php

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
<title>Gallery Index</title>
<link href="Stylesheets/Style1.css" rel="stylesheet" type="text/css">
</head>
<body>

<br /><p>Currently available Gallery Albums</p><br/><br />
<table border="0" cellpadding="10" cellspacing="0" width="600" >
<tr><td>
<?
DisplayFolderlist();
?>
</td></tr></table>
</body>
 
</html>