<?php
// Login Functions

$Login_User = str_pad($User, 30);
$Login_Email = str_pad($EmailAddress, 50);
$Login_Pwd = $PWord;
$Login_Auth = "N";
$Login_Date = "dd/mm/yyyy";
$fp;	// File pointer declaration
$Filename;

function CreateUserlistFile()
{
if ( !file_exists( "Userlist.dat" ) )
	{
	touch ( "Userlist.dat" );
	}
}
/* ---------------------------------------------------------------------------- */

function CreateAuthentication( $Trigger )
{
//Create a pseudo random password
$Password = MD5( $Trigger );
return $Password;
}
/* ---------------------------------------------------------------------------- */
function CreateDataStr ($Login_User,$Login_Email,$Login_Pwd,$Login_Auth,$Login_Date)
{
$DataStr = sprintf('%-30s%-50s%-32s%-1s%-10s',$Login_User,$Login_Email,$Login_Pwd,$Login_Auth,$Login_Date);
return $DataStr;
}
/* ---------------------------------------------------------------------------- */
function AppendDataToFile( $DataStr )
{
$fp = fopen( "Userlist.dat", 'a');
flock($fp, LOCK_EX);
fwrite($fp, $DataStr);
flock($fp, LOCK_UN);
fclose($fp);
}
/* ---------------------------------------------------------------------------- */
function FindUsername( $User )
{
$fp = fopen( "Userlist.dat" , 'r' );
flock($fp , LOCK_EX );
$Counter = 0;
$Pointer = 0;

while ( !feof( $fp ) ) 
{
	$chunk = fread( $fp, 123 );
	//print "\nChunk read - $chunk \n<br>";
	$working = strtolower(rtrim(substr( $chunk,0,30 )));
	//print "\nComparing $working against $User \n<br>";
	if ( $working == $User )
	{
	
	$Pointer = $Counter;
	}
	$Counter++;
	
}
flock($fp, LOCK_UN);
return $Pointer;
}
/* ---------------------------------------------------------------------------- */
function CheckUsername( $Username )
{
$WorkingStr = mb_strtolower( $Username );
$Pointer = FindUsername( $WorkingStr );
if ( $Pointer <> 0)
	{
	//print "\n Username $Username has been found at $Pointer \n<br>";
	}
return $Pointer;
}
/* ---------------------------------------------------------------------------- */
function FetchPassword ( $Username )
{
$fp = fopen( "Userlist.dat" , 'r' );
flock($fp , LOCK_EX );

while ( !feof( $fp ) ) 
{
	$chunk = fread( $fp, 123 );
	//print "\nChunk read - $chunk \n<br>";
	$working = strtolower(rtrim(substr( $chunk,0,30 )));
	$User = strtolower ( $Username );
	//print "\nComparing $working against $User \n<br>";
	if ( $working == $User )
	{
	$Password =GetPassword ( $chunk );
	}
	
}
flock($fp, LOCK_UN);
return $Password;
}
/* ---------------------------------------------------------------------------- */
function GetUsername ( $DataStr )
{
return substr($DataStr,0,30);
}
function GetEmailAddr ( $DataStr )
{
return substr($DataStr,30,50);
}
function GetPassword ( $DataStr )
{
return substr( $DataStr,80,32 );
}
function GetAuthentication ( $DataStr )
{
return substr( $DataStr, 112, 1 );
}
function GetAcctDate ( $DataStr )
{
return substr( $DataStr, 113, 10 );
}
/* ---------------------------------------------------------------------------- */
function Mail_Registration( $Comment )
{
//$TextComment = StripControlChars( $Comment );
$to = trim(GetEmailAddr ( $Comment ) ); 
$subject = "Ace trials team - Website Registration";
$message = "\nThank you for registering with the Ace Trials Team Website \n
\n\nTo complete your registration please follow the link below
\n\n\nhttp://www.acetrialsteam.co.uk/Chatroom/Authentication.php?datastr=$Comment\n
\n\n$TextComment\n\nRegards
\n\nAce Trials Team\nhttp://www.acetrialsteam.co.uk\n"; 

$headers = "From: acetrialsteam <webmaster@acetrialsteam.co.uk>";
// . "\r\n" . "Reply-To: webmaster@acetrialsteam.co.uk" . "\r\n" . "X-Mailer: PHP/" . phpversion();
/*
if (mail($to, $subject, $message, $headers )) print "Sent OK $Email_Time<br>\n";
else "Sender fail <br>\n";
*/
}
//**********************************************************************************
// Validate returns True or false
function ValidateEmailAddr( $Email_Addr )
{
$Addr_Flag = False;
$Addr_Flag2 = False;
$Addr_Len = strlen( $Email_Addr );
$Position = strpos( $Email_Addr, "@");

if ( strlen($Email_Addr) > 5)
{

$Email_Addr = strtolower( $Email_Addr );
//print "Email Address , $Email_Addr, ";
if ( strstr( $Email_Addr, "@") ){ $Addr_Flag = True;}
// if ( Position == 0 ) { $Addr_Flag = False; }
if ( Position == strlen($Email_Addr)-1 ) {$Addr_Flag = False;}
if ( $test = substr( $Email_Addr, -3 ) == ".uk") { $Addr_Flag2 = True;}
if ( $test = substr( $Email_Addr, -4 ) == ".com") { $Addr_Flag2 = True;}
if ( $test = substr( $Email_Addr, -4 ) == ".net") { $Addr_Flag2 = True;}
if ( $test = substr( $Email_Addr, -4 ) == ".org") { $Addr_Flag2 = True;}
if ( $test = substr( $Email_Addr, -4 ) == ".biz") { $Addr_Flag2 = True;}
if ( $test = substr( $Email_Addr, -3 ) == ".fr") { $Addr_Flag2 = True;}
if ( $test = substr( $Email_Addr, -3 ) == ".au") { $Addr_Flag2 = True;}

$Ret_Value = False;
if  (( $Addr_Flag == True)  AND ( $Addr_Flag2 == True )) 
		{ $Ret_Value = True; 
		//print "Valid OK, ";
		}
		else
		{ //print "Valid fail, "; 
		}
return $Ret_Value;
}
}



?>
