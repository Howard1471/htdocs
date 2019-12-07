<?php
// These functions support a 5 digit counter

$Visitors;	//The required value to display
$filename = array ( "0.gif","1.gif","2.gif","3.gif","4.gif","5.gif","6.gif","7.gif","8.gif","9.gif");
$FolderPath = "images/";
$CounterPath = "../Counter.txt";
$GraphicName = array(5);

//Retrieve the counter value
//Values read as Visitors/revisits/new
//Main routine
$fp = fopen($CounterPath,"r");
$Visitors = sprintf( "%05d", file_get_contents($CounterPath));
fclose($fp);

for ($x=0; $x<=4; $x++)
	{
	$valuestr = substr($Visitors, $x, 1);
	$value = (int)( $valuestr );
	$GraphicName[$x] = $FolderPath.$filename[ $value ];
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
         "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

<head>
<meta http-equiv="Content-Language" content="en-gb">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Counters test page</title>
</head>

<body>
<p>Counters test page</p>
<p>&nbsp;</p>
<table border="1" width="150" cellspacing="0" cellpadding="0" height="32" id="table1">
	<tr>
		<td>
		<p align="center">
		<img border="0" src="<? echo $GraphicName[0] ?>" width="15" height="30">
		<img border="0" src="<? echo $GraphicName[1] ?>" width="15" height="30">
		<img border="0" src="<? echo $GraphicName[2] ?>" width="15" height="30">
		<img border="0" src="<? echo $GraphicName[3] ?>" width="15" height="30">
		<img border="0" src="<? echo $GraphicName[4] ?>" width="15" height="30">
		</td>
	</tr>
	<tr>
		<td>
		<p align="center">Visitors</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>



</body>

</html>