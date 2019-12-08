<?php
/* Support Functions for File access

*/

//$Target_root = "/home/www/mhn-ltd.com/Comments";
$Target_root = "../Comments/";
$Target_root1 = $Target_root . "Data/";
$Target_root2 = $Target_root . "Files/";

$Report_Err = 0;
$Image_Err =0;
$newwidth=400; // New Landscape picture width
$Datafile = $Target_root3 . "ReportsList.dat";

$Record_Number = 0;
$Record_Headline = "";
$Record_Subheading = "";
$Record_TXTFilename = "";
$Record_PhotoFilename = "";
$Record_PhotoTitle = "";
$Record_UploadDate = "";

function CreateDatafile( $Filename )
{
touch ( $Filename );
}
function UpdateID ( $Number )
{ $Record_Number = Number; }
function UpdateHeadline ( $Headline )
{ $Record_Headline = $Headline; }
function UpdateSubheading ( $Subheading )
{ $Record_Subheading = $Subheading; }
function UpdateTXTFilename ( $TXTFilename )
{ $Record_Number = $TXTFilename; }
function UpdatePhotoFilename ( $PhotoFilename )
{ $Record_Number = $PhotoFilename; }
function UpdatePhotoTitle ( $PhotoTitle )
{ $Record_Number = $PhotoTitle; }
function UpdateUploadDate ( $UploadDate )
{ $Record_Number = $UploadDate; }

function AppendDatafile ( $Filename )
{
// Append each data item in order
$fp = fopen( $Filename , 'a' );
fwrite( $fp,$Record_Number );
fwrite( $fp,$Record_Headline );
fwrite( $fp,$Record_Subheading );
fwrite( $fp,$Record_TXTFilename );
fwrite( $fp,$Record_PhotoFilename );
fwrite( $fp,$Record_PhotoTitle );
fwrite( $fp,$Record_UploadDate );
fclose($fp);
}
function ReadDataFile ( $fp )
{
$Record_Number = fread( $fp);
$Record_Headline = fread( $fp);
$Record_Subheading = fread( $fp);
$Record_TXTFilename = fread( $fp );
$Record_PhotoFilename = fread( $fp );
$Record_PhotoTitle = fread( $fp );
$Record_UploadDate = fread( $fp );
fclose($fp);
}
//Reverse the order of the data file completely
function ReverseDataFile( $Filename )
{
$count = 0;
$fp = fopen( $Filename , 'r' );
$line = fgets($fp, 1024 );
$Record_Array[] = $line; //key will be zero
//echo "$line <br />";
	while ( !feof( $fp ) )
	{
    $count++;
    $line = fgets($fp, 1024 );
	$Record_Array[$count] = $line;
	//echo "$Record_Array[$count] <br />";
	}
fclose($fp);
rsort($Record_Array);
$fp = fopen( $Filename , 'w' );
for ($loop1 = 0; $loop1 <= $count; $loop1++ ) 
	{
	fwrite ( $fp, $Record_Array[$loop1] ); 
	}
fclose($fp);

}

//"$Reference,$DataTitle,$DataSubtitle,$DataUserFile,$DataImageTitle,$DataImageFile,$UploadDate\n"
function CountRecords( $Filename )
{
$count = 0;
$fp = fopen( $Filename , 'r' );
$line = fgets($fp, 1024 );
while ( !feof( $fp ) )
	{
    $count++;
    $line = fgets($fp, 1024 );
	}
fclose($fp);
return $count;
}



?>
