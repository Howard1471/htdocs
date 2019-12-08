<?php
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
<p><? echo $StrMessage; ?></p>
</body>
</html>
<?
}



function RemoveRTFControls( $rtf_filename )
{
$ReturnStr = "";
$BraceCounter = 0;
$SourcePtr = 1;
$ReturnPtr	= 0;
$TargetPtr = 0;
$SourceChar = "";
$loop1 = 0;
$BracesOpen = false;
$JustClosed = false;

$text = file_get_contents($rtf_filename);
//check for length of file
if (!strlen($text)) {
 	echo "bad file";
 	return $text;
	}
ErrorMsg( "<br>File Length : ".strlen( $text )."<br>" );	
for ( $loop1 = 0; $loop1 <= strlen( $text ) ; $loop1++ )
	{
		$SourceChar = substr( $text, $loop1, 1 );
		switch ( $SourceChar ) {
			case '{':
				$BraceCounter++;
				if ( $BraceCounter == 1 ) { $BracesOpen = true; }
			break;
			case '}':
				$BraceCounter--;
				if ( $BraceCounter == 0 ) 
					{ 
					$BracesOpen = false;
					$JustClosed = true;
					}
			break;
			case chr(13):
				$ReturnStr = $ReturnStr;
			break;
			
			default:
			if ( ($BracesOpen == false ) && ($JustClosed == false) ) { 
				$ReturnStr = $ReturnStr.$SourceChar ;
				//ErrorMsg ( $SourceChar );
				}
		}//end of switch
	$JustClosed = false;
	} // End of For/next loop
$text = $ReturnStr;
ErrorMsg ( "<br>Pass 1 text :<br>".$text );
$ReturnStr = "";
//ErrorMsg( $text );
$BraceCounter = 0;
for ( $loop1 = 1; $loop1 <= strlen( $text ) ; $loop1++ )
	{
	$SourceChar = substr( $text, $loop1, 1 );
	switch ( $SourceChar )
		{
			case "<":
				$BraceCounter++;
				if ( $BraceCounter == 1 ) { $BracesOpen = true; }
			break;
			case ">":
				$BraceCounter--;
				if ( $BraceCounter == 0 ) 
					{ 
					$BracesOpen = false;
					$JustClosed = true;
					}
			break;
			case chr(13):
				$ReturnStr = $ReturnStr;
				//if ( ($BracesOpen == false ) && ($JustClosed == false) ) { $ReturnStr = $ReturnStr; }
				break;
			default:
			if ( ($BracesOpen == false ) && ($JustClosed == false) ) { $ReturnStr = $ReturnStr.$SourceChar ; }
		}//End of switch/case
	$JustClosed = false;
	}//End of For/Next
$text = $ReturnStr;
$ReturnStr = str_replace("&nbsp","", $text );	
//ErrorMsg( $text );		
return $ReturnStr;
}// End of Function
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>