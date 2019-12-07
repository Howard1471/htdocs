<?php
// Display all thumbnails from specified gallery
$UserTitle = $_GET['Albumname'];
//include all the standard functions
include( "Gallery_Functions.php" );

?>
<html>

<head>
<meta http-equiv= ; Content - Language;  content= ; en - gb; >
<meta http-equiv=Content-Type content=text/html; charset=windows-1252>
<title><? echo $Usertitle; ?></title>
<body text= #FFFFFF bgcolor= #808080 >

</head>

<body>
<table align="center" border="0" cellpadding="0" cellspacing="0" >
<tr><td>
<p><font size=4>Click on an image to see a larger copy</font></p>
<?
echo "<p>Selected Album : ". $UserTitle. "<p>";
?>
</td></tr>
<tr><td>
<?
//echo "VJD001 ". "Width ". $Record_Width . " Height " . $Record_Height ;
$file_array = scandir ( $Target_root3.$UserTitle."/images" );
$Page_array = scandir ( $Target_root3.$UserTitle."/html" );
$ImageCount = count( $file_array ) - 2;
$RowTotal = (int)($ImageCount/4) + 1;
//echo "Images: " . $ImageCount . " Rows " . $RowTotal . "<br />";

if ($ImageCount > 0 ) {
	

echo "<table border= 0 width= 650 cellspacing= 0 cellpadding= 0 id=table0>\n";
echo "<tr>\n";

	for ($loop1 = 1; $loop1 < $RowTotal ; $loop1++ )
	{
    echo "<td height= 100 align=center width= 150>\n";
    echo "<A href =\"". $Target_root3.$UserTitle."/html/".$Page_array[($loop1 * 4) - 2]."\" target = _Blank>\n";
    FetchCatalog( SplitFilename( $Page_array[($loop1 * 4) - 2] ) );
	echo "<img border= 0 src= \"" .$Target_root3.$UserTitle."/images/".$Record_PhotoFilename."\" width= ". Thumbnail_Width( $Record_Height,$Record_Width ) . " height= 90></A></td>\n";
	echo "<td height=100 width=50 align=center>&nbsp;</td>\n";
	
	echo "<td height= 100 align=center width= 150>\n";
    echo "<A href =\"". $Target_root3.$UserTitle."/html/".$Page_array[($loop1 * 4) - 1]."\" target = _Blank>\n";
    FetchCatalog( SplitFilename( $Page_array[($loop1 * 4) - 1] ) );
	echo "<img border= 0 src= \"" .$Target_root3.$UserTitle."/images/".$Record_PhotoFilename."\" width=  ". Thumbnail_Width( $Record_Height,$Record_Width ) . " height= 90></A></td>\n";
	echo "<td height=100 width=50 align=center>&nbsp;</td>\n";
	
	echo "<td height= 100 align=center width= 150>\n";
    echo "<A href =\"". $Target_root3.$UserTitle."/html/".$Page_array[($loop1 * 4)]."\" target = _Blank>\n";
    FetchCatalog( SplitFilename( $Page_array[($loop1 * 4) ] ) );
	echo "<img border= 0 src= \"" .$Target_root3.$UserTitle."/images/".$Record_PhotoFilename."\" width=  ". Thumbnail_Width( $Record_Height,$Record_Width ) . " height= 90></A></td>\n";
	echo "<td height=100 width=50 align=center>&nbsp;</td>\n";
	
	echo "<td height= 100 align=center width= 150>\n";
    echo "<A href =\"". $Target_root3.$UserTitle."/html/".$Page_array[($loop1 * 4) + 1]."\" target = _Blank>\n";
    FetchCatalog( SplitFilename( $Page_array[($loop1 * 4) + 1] ) );
	echo "<img border= 0 src= \"" .$Target_root3.$UserTitle."/images/".$Record_PhotoFilename."\" width=  ". Thumbnail_Width( $Record_Height,$Record_Width ) . " height= 90></A></td>\n";
	echo "<td height=100 width=50 align=center>&nbsp;</td></tr>\n";

    echo "<tr>\n";
    echo "<td align=center>" . SplitFilename( $Page_array[($loop1 * 4) - 2] )."</td>\n";
    echo "<td width=5 align=center>&nbsp;</td>\n";
    echo "<td align=center>" . SplitFilename( $Page_array[($loop1 * 4) - 1] )."</td>\n";
    echo "<td width=5 align=center>&nbsp;</td>\n";
    echo "<td align=center>" . SplitFilename( $Page_array[($loop1 * 4)] )."</td>\n";
    echo "<td width=5 align=center>&nbsp;</td>\n";
    echo "<td align=center>" . SplitFilename( $Page_array[($loop1 * 4) + 1] )."</td>\n";
    echo "</tr>	\n";
	}
$loop1 = $RowTotal ;
$Images_left = $ImageCount - ($RowTotal - 1)*4;
$LeftOvers =  4 - $Images_left;

if ($Images_left > 0 ) {
$Array_Marker = $ImageCount - $Images_left + 1;

echo "<table border= 0 width= 650 cellspacing= 0 cellpadding= 0 id=table0>\n";
echo "<tr>\n";
	for ($loop1 = 1 ; $loop1 <= $Images_left ; $loop1++ ) //The final Thumbnails
	{
    echo "<td height= 100 align=center width= 150>\n";
    echo "<A href =\"". $Target_root3.$UserTitle."/html/".$Page_array[$Array_Marker + $loop1]."\" target = _Blank>\n";
    FetchCatalog( SplitFilename( $Page_array[$Array_Marker + $loop1] ) );
	echo "<img border= 0 src= \"" .$Target_root3.$UserTitle."/images/".$Record_PhotoFilename."\" width=  ". Thumbnail_Width( $Record_Height,$Record_Width ) . " height= 90></A></td>\n";
	echo "<td height=100 width=50 align=center>&nbsp;</td>\n";
	}
	for ($loop1 = 1 ; $loop1 <= $LeftOvers ; $loop1++ ) //The final Thumbnails
	{
    echo "<td height= 100 align=center width= 150><p>&nbsp;</p></td>\n";
	echo "<td height=100 width=50 align=center>&nbsp;</td>\n";
	}

	echo "</tr><tr>\n";
    for ($loop1 = 1 ; $loop1 <= $Images_left ; $loop1++ )
	{
	echo "<td align=center>" . SplitFilename( $Page_array[$Array_Marker + $loop1] )."</td>\n";
    echo "<td width=5 align=center>&nbsp;</td>\n";
	}
	for ($loop1 = 1 ; $loop1 <= $LeftOvers ; $loop1++ ) //The final Thumbnails
	{
	echo "<td align=center>&nbsp;</td>\n";
    echo "<td width=5 align=center>&nbsp;</td>\n";
	}


	
echo "</tr></table>\n";
echo "<p>&nbsp;</p>\n";

}

}
else
{
	echo "<i>There are currently no photos in this Album.</i><br>";
}

?>
</td></tr></table>
</body>
</html>
