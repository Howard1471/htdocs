<?php
$Email = $_POST['T1'];
$EmailConfirm = $_POST['T1a'];
$Password = $_POST['T2'];
$PasswordConfirm = $_POST['T2a'];

$UserName = $_POST['T3'];
$Address1 = $_POST['T3a'];
$Address2 = $_POST['T3b'];
$Address3 = $_POST['T3c'];
$City = $_POST['T4'];
$Postcode = $_POST['T5'];
$Telephone = $_POST['T6'];
$Mobile = $_POST['T7'];

$Usertype = $_POST['S1'];
$UserOther = $_POST['T8'];
$Request = $_POST['C1'];
$UserCategory;

function ValidateEmailAddr( $Email_Addr )
{
$Addr_Flag = True;
$Addr_Flag2 = False;
$Addr_Len = strlen( $Email_Addr );
$Position = strpos( $Email_Addr, "@");

if ( strlen($Email_Addr) > 5)
{
$Email_Addr = strtolower( $Email_Addr );
//print "<p> Address Parsed, $Email_Addr\n\n";

if ( $Position == 0 ) { $Addr_Flag = False;}
if ( $Position == strlen($Email_Addr)-1 ) {$Addr_Flag = False; print "<p> $Email_Addr, Failed strlen test 0\n";}

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
		}
return $Ret_Value;
}

$User = $_POST['T1'];
$Email = $_POST['T2'];
$Address1 = $_POST['T3a'];
$Address2 = $_POST['T3b'];
$Address3 = $_POST['T3c'];
$City = $_POST['T4'];
$Postcode = $_POST['T5'];
$Telephone = $_POST['T6'];
$Mobile = $_POST['T7'];
$Usertype = $_POST['S1'];
$UserOther = $_POST['T8'];
$Request = $_POST['C1'];
$UserCategory;

	
if (trim($Usertype) == 'Other')
	{
	if (strlen($UserOther) > 1) { $UserCategory = $UserOther; }else{$UserCategory = 'Unspecified';}
	}
	else
	{
	$UserCategory = $Usertype;
	}

if ($Request == True)
	{
	$Update = 'N';
	}
	else
	{
	$Update = 'Y';
	}

/* Write the details to the files in the appropriate locations. */
$FolderRoot = "Profiles/";
$Email = strtolower( $Email );
$FolderLocation = $FolderRoot.$Email;
$ExpStr = "Expansion";
$filename = $FolderLocation."/Register.txt";
if ( ! File_exists( $FolderLocation ) )
	{
	mkdir($FolderLocation, 0755 ); /* full permissions */
	}
	else
	{
	SendErrorPage ( "Error: Email address already registered, Please enter new one" );
	exit;
	}
	

if ( ! file_exists($filename) ){
	touch( $filename );
	print "\n\nFile not found\n";
	$fp = fopen( $filename, w );
	fwrite( $fp , "$User,$Email,$UserCategory,$Address1,$Address2,$Address3,$City,$Postcode,$Telephone,$Mobile,$Update\n" );
	}else{
	print "\n\nFile found\n";
	$fp = fopen( $filename, a );
	fwrite( $fp , "$User,$Email,$UserCategory,$Address1,$Address2,$Address3,$City,$Postcode,$Telephone,$Mobile,$Update\n" );
	}
fclose($fp);


?>
</div>
						 
						 
						 

</body>

</html>