<?php
include("common.php");

function error_flag($error, $field) 
{
if ($error[$field]) 
	{
	print  '<td class="error" ' ;
	} else {
	print "<td " ;
	}
} //end function error_flag

function check_form() 
{
global $error, $print_again , $Email, $T1, $T2, $T3a, $T3b, $T3c, $T4, $T5, $T6, $T7, $S1, $T8, $T9, $T10, $C1, $PassHash;
$error['T1'] = false;
$error['T2'] = false;
$error['T3a'] = false;
$error['T4'] = false;
$error['T5'] = false;
$error['T6'] = false;
$error['T9'] = false;
$error['T10'] = false;
$print_again = false;


if($T1 == "") 
	{
	$error['T1'] = true;
	$print_again = true;
	//print " Error in T1 entry \n<br>";
	}
if($T2 == "") 
	{
	$error['T2'] = true;
	$print_again = true;
	//print " Error in T2 entry \n<br>";
	}
if($T3a == "") 
	{
	$error['T3a'] = true;
	$print_again = true;
	//print " Error in T3 entry \n<br>";
	}
if($T4 == "") 
	{
	$error['T4'] = true;
	$print_again = true;
	//print " Error in T4 entry \n<br>";
	}
if($T5 == "") 
	{
	$error['T5'] = true;
	$print_again = true;
	//print " Error in T5 entry \n<br>";
	}
if($T6 == "") 
	{
	$error['T6'] = true;
	$print_again = true;
	//print " Error in T6 entry \n<br>";
	}
if($T9 == "") 
	{
	$error['T9'] = true;
	$print_again = true;
	//print " Error in T9 entry \n<br>";
	}
if($T10 == "") 
	{
	$error['T10'] = true;
	$print_again = true;
	//print " Error in T10 entry \n<br>";
	}

if ( $T9 == $T10 ) 
	{
	$PassHash = md5( $T9 );
	}
	else
	{
	$error['T9'] = true;
	$error['T10'] = true;
	$T9 = "";
	$T10 = "";
	$print_again = true;
	// print " Passwords did not match \n<br>";
	}
if ( $print_again == true ) // Clear the password fields
	{
	$T9 = "";
	$T10 = "";
	}	
if ( ! ValidateUsername( $T1 ) )
	{
	$error['T1'] = true;
	$print_again = true;
	}	


$FolderRoot = "Profiles/";
$Username = strtolower( $T1 );
$FolderLocation = $FolderRoot.$Username;
$ExpStr = "Expansion";
// $filename = $FolderLocation."/Register.txt";
/* Dont create the folder here as it may trip up if there is an error elsewhere on the form */
if ( file_exists( $FolderLocation ) )
	{
	$error['T1'] = true;
	$print_again = true;
	$T1 = " *** Already in Use ***";
	}
if($print_again) 
	{
	print_form();
	} 
	else 
	{
	Create_Profile();
	Completed_Form();
	}
} // end function check_form

function ValidateUsername( $Username )
{
/* This function checks that the given username obeys the rules,
in this case we want 
1.letters and numbers only
2.Cannot start with a number
*/
$result1 = false;
$result2 = false;

if ( ctype_alnum($Username) ) //True if OK
	{
	$result1 = true;
	}
if ( ! ctype_digit($Username[0]) ) //True if 1st char is a number
	{
	$result2 = true;
	}
if ( ( result1 == true ) and ( result2 == true) ) { return true; } else { return false; }
 
} // End of ValidateUsername

function CreateFolderStructure( $FolderLocation )
{
if ( !file_exists( $FolderLocation ) )
	{
	//print "Folder Location parsed : $FolderLocation \n<br>";
		mkdir($FolderLocation, 0755 ); /* full permissions */
	//print "Folder has been created. \n<b>";
	}
}

function Create_Profile ()
{
global $T1, $T2, $T3a, $T3b, $T3c, $T4, $T5, $T6, $T7, $S1, $T8, $T9, $T10, $PassHash, $C1, $Testpass, $ProfileAddress ;


CreateFolderStructure( $ProfileAddress );
$FolderRoot = $ProfileAddress;
$Username = strtolower( $T1 );
$FolderLocation = $FolderRoot.$Username;
$filename = $FolderLocation."/Register.txt";
if ( file_exists( $FolderLocation ) )
	{
	//print " Folder ".$FolderLocation." reported as exists\n<br>";
	SendErrorPage ( "Error: ".$Username." already registered, Please enter different Username" );
	exit;
 	}
	else
	{
	mkdir($FolderLocation, 0755 ); /* full permissions */
	//print "Folder has been created. \n<b>";
	}
	
if ($C1 == True)
	{
	$Update = 'N';
	}
	else
	{
	$Update = 'Y';
	}
if (trim($S1) == "Other")
	{
	if (strlen($T8) > 1) { $UserCategory = $T8; }else{$UserCategory = "Unspecified";}
	}
	else
	{
	$UserCategory = $S1;
	}
	
if ( ! file_exists($filename) )
	{
	touch( $filename );
	$fp = fopen( $filename, w );
	fwrite( $fp , "$T1,$T2,$T3a,$T3b,$T3c,$T4,$T5,$T6,$T7,$S1,$T8,$PassHash,$Update\n" );
	}else{
	$fp = fopen( $filename, a );
	fwrite( $fp , "$T1,$T2,$T3a,$T3b,$T3c,$T4,$T5,$T6,$T7,$S1,$T8,$PassHash,$Update\n" );
	}
fclose($fp);
}

function Completed_Form()
{
global $T1, $T2, $T3a, $T3b, $T3c, $T4, $T5, $T6, $T7, $S1, $T8, $T9, $T10, $C1 ;
//Create_Profile ();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
         "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Language" content="en-gb">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Eckington Online - Registration</title>
<style>
p { font-family: Arial; font-size:10pt; }
textarea { font-family: Arial; font-size:10pt; }
input { font-family: Arial; font-size:10pt; }
select { font-family: Arial; font-size:10pt; }
</style>
</head>

<tr vAlign="top"><td height="432" align="left" >
<p align="center" class = "title">Visitor Registration</p>
<p align="center">You have successfully completed the Registration Form</p>

<form action="<? echo $CompletedURL ?>" Target="_parent" style="text-align: left" ?> Target = "_parent" style="text-align: left">

<div align="center"><table width="400" height="200" border = 1 cellspacing="0" cellpadding="0">
<tr><td align="left"><p align= "center">Click below to Continue</p>
<p align="center"><input type="submit" value="Continue"></p>
</td></tr></table></div></form><hr>
<h5 align="center">Copyright © 2009 Softback Websites . All rights reserved.</h5>
</td></tr></table></body></html>
<?
}
function SendErrorPage( $mesg )
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
         "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Language" content="en-gb">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Eckington Online - Registration Error</title>
<style>
p { font-family: Arial; font-size:10pt; }
textarea { font-family: Arial; font-size:10pt; }
input { font-family: Arial; font-size:10pt; }
select { font-family: Arial; font-size:10pt; }
</style>
</head>
<div align="center">
<table style="width: 580px; height: 400px" cellSpacing="0" cellPadding="0" border="0" id="table2">
<tr vAlign="top"><td height="432" align="left" >
<p align="center" class = "title">Registration Error Page</p>
<p align="center"><? print $mesg ?></p>
<form action="<? echo($PHP_SELF) ?>" Target = "I1" method="POST" style="text-align: left">
<div align="center"><table width="400" height="200" border = 1 cellspacing="0" cellpadding="0">
<tr><td align="left"><p align= "center">Click below to Continue</p>
<p align="center"><input type="submit" value="Continue"></p>
</td></tr></table></div></form><hr>
<h5>Copyright © 2009 Softback Websites . All rights reserved.</h5>
</td></tr></table></body></html>
<?
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
         "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

<head>
<meta http-equiv="Content-Language" content="en-gb">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Eckington Online - Registration</title>

<style type="text/css">
p { font-family: Arial; font-size:10pt; }
textarea { font-family: Arial; font-size:10pt; }
input { font-family: Arial; font-size:10pt; }
select { font-family: Arial; font-size:10pt; }
.error {color:red;}
</style>

</head>

<?php
// This is the main data input form
function print_form()
{
global $error, $print_again, $page, $T1, $T2, $T3a, $T3b, $T3c, $T4, $T5, $T6, $T7, $S1, $T8, $T9, $T10, $C1 ;
?>
	<div align="center">
		<table style="width: 580px; height: 400px" cellSpacing="0" cellPadding="0" border="0" id="table2">
			<tr vAlign="top">
				<td height="432" align="left" >
				<p align="center" class = "title">Visitor Registration</p>
				<p align="center">Please complete the following details to register with this website</p>
				<p align="left">
				<form action="<? echo($PHP_SELF) ?>" Target = "I1" method="POST" style="text-align: left">
				<div align="center">
					<table width="400" height="200" border = 1 cellspacing="0" cellpadding="0">
					<tr>
					<td align="left">
						
						<table >
						<tr>
						<td width="75">&nbsp;</td>
						<td>
<?
						if($print_again) 
							{?><p align="center"><font color="#FF0000">Please complete the missing fields.</font>
							<?} else {?>
						<p align="center"><font color="#FFFFFF">* Must fill in these items</font>
							<?}
?>
						</td>
						</tr>
										
						<tr>
						<? error_flag($error, "T1"); ?> width="75">Username *</td>
						<td><input type="text" size="35" maxlength="256" name="T1" 
						value="<?=$T1 ?>" ></td>
						</tr>
						
									
						<tr>
						<? error_flag($error, "T9"); ?> width="75">Password *</td>
						<td><input type="password" size="35" maxlength="256" name="T9" 
						value="<?=$T9 ?>" ></td>
						</tr>
						
						<tr>
						<? error_flag($error, "T10"); ?> width="75">Confirm *</td>
						<td><input type="password" size="35" maxlength="256" name="T10" 
						value="<?=$T10 ?>" ></td>
						</tr>
						<tr>
						<? error_flag($error, "T3a"); ?> width="75" valign="top">Address *</td>
						<td><input type="text" size="35" maxlength="256" name="T3a" value="<?=$T3a ?>"></td>
						</tr>
			
						<tr>
						<td width="75">&nbsp;</td>
						<td><input type="text" size="35" maxlength="256" name="T3b" value="<?=$T3b ?>"></td>
						</tr>
			
						<tr>
						<td width="75">&nbsp;</td>
						<td><input type="text" size="35" maxlength="256" name="T3c" value="<?=$T3c ?>"></td>
						</tr>
			
						<tr>
						<? error_flag($error, "T4"); ?> width="75">City *</td>
						<td><input type="text" name="T4" size="30" value="<?=$T4 ?>"></td>
						</tr>
			
						<tr>
						<? error_flag($error, "T5"); ?> width="75">Postcode *</td>
						<td><input type="text" name="T5" size="30" value="<?=$T5 ?>"></td>
						</tr>
			
						<tr>
						<? error_flag($error, "T6"); ?> width="75">Telephone *</td>
						<td><input type="text" name="T6" size="30" value="<?=$T6 ?>"></td>
						</tr>
			
						<tr>
						<? error_flag($error, "T7"); ?> width="75">Mobile</td>
						<td><input type="text" name="T7" size="30" value="<?=$T7 ?>"></td>
						</tr>
			
						<tr>
						<? error_flag($error, "T2"); ?> width="75">E-mail *</td>
						<td><input type="text" size="35" maxlength="256" name="T2" value="<?=$T2 ?>"></td>
						</tr>
						
						</table>
		
		
						<p align= "left">
						<select name="S1" size="1" value="<?=$S1 ?>">
							<option selected>Individual</option>
							<option>Company</option>
							<option>Trader</option>
							<option>Shop owner  </option>
							<option>Other  </option>
						</select>&nbsp;&nbsp;&nbsp; Other:
						<input type="text" size="26" maxlength="256" name="T8" value="<?=$T8 ?>">
						</p>
						<p align= "left">
						<input type="checkbox" name="C1" value="C1"value="<?=$C1 ?>">Please tick 
						this box if you don't want to receive updates</p>

						<p align="center">
						<input type="submit" name="submit" value="Submit">
						<input type="reset" name="reset" value="Clear Form"></p>
					</td>
					</tr>
					</table>
				</div>
				</form>
				<hr>
				<h5>Copyright © 2009 Softback Websites. All rights reserved.</h5>

				</td>
			</tr>
		</table></div>
<?
}
 /***** MAIN *****/
if(isset($submit)) 
	{
	check_form();
	} else {
	print_form();
	}
?></body></html>