<?php
// Data save functions

$NameData = $_POST['txtName'];
$FromData = $_POST['txtFrom'];
$TelData = $_POST['txtTel'];
$EmailData = $_POST['txtEmail'];


//$Target_root = "/home/www/mhn-ltd.com/Comments";
$Target_root = "../Comments/";
$Target_root1 = $Target_root . "Data/";
$Target_root2 = $Target_root . "Files/";


function CreateDatafile( $Filename )
{
touch ( $Filename );
}
function CreateDataRecord( $VarArray )
{
	//Take the array and convert into a single csv line and return that line
	for ($Counter = 0; $Counter < count($VarArray) ; $Counter++ )
		{
			$line = $line.$VarArray[$Counter].',';
		}
	return $line;
}
function SplitDataRecord ( &$VarArray, $line )
{
	$VarArray = explode(",",$line);
}

function WriteDataRecord ( $filename, $DataRecord )
{
	if ( !file_exists( $filename ) )
	{
		touch ($filename);
	}
	$fp = fopen( $filename, 'a' );
	fwrite ( $fp, $DataRecord );
	fclose($fp);
}
function ReadDataRecord( $filename, &$var )
{
	//&$var is parsed by reference
		if ( !file_exists( $filename ) )
	{
		$returnvalue = 0;
	}
	$fp = fopen( $filename, 'r' );
	$line = fgets ( $fp, 1024 ); //reads the line
	fclose($fp);
return $line;
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Docsave output</title>
</head>
<?
echo'<br> Name  : '.$NameData.'<br>';
echo'<br> From  : '.$FromData.'<br>';
echo'<br> Tel   : '.$TelData.'<br>';
echo'<br> Email : '.$EmailData.'<br>';

?>
<body>
</body>
</html>