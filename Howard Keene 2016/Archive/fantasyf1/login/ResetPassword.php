<?php
include("LoginMailer_html.php");
include("LoginSQL.php");
//Emailer Globals
//global $Destination, $Source, $Blindcc, $Website,  $captchafield, $code, $possibles, $try_again, $captchatxt;
//global $name, $email, $confirm, $messagetext;
//Functions

//Global Variables
global $Usermail;
global $OldPwd,$OldMD5;
global $NewPwd,$ConfirmPwd,$NewMD5;



function error_flag($error, $field) 
{
if ($error[$field]) 
	{
	print  '<p class="error">' ; //css class sets the colour
	} else {
	print "<p>" ;
	}
} //end function error_flag

function check_form() //Needs to be updated with new code
{
global $Usermail;
global $OldPwd,$OldMD5;
global $NewPwd,$ConfirmPwd,$NewMD5;
global $error;


$error['loginid'] = false;
$error['oldpwdstr'] = false;
$error['newpwdstr'] = false;
$error['confirmpwdstr'] = false;

$print_again = false;

//ErrorMsg( "Check Form tested");
	if ( strlen($Usermail) = 0 )
		{
			$error['loginid'] = true;
			$print_again = true;
		}
	if ( strlen( $OldPwd) = 0 )
		{
			$error['oldpwdstr'] = true;
			$print_again = true;
		}
	if ( strlen($NewPwd) = 0 )
		{
			$error['newpwdstr'] = true;
			$print_again = true;
		}
	if ( strlen($ConfirmPwd	) = 0 )
		{
			$error['confirmpwdstr'] = true;
			$print_again = true;
		}
	if (ValidateEmailAddr( $Usermail ) == false )
		{
			$error['loginid'] = true;
			$print_again = true;
		}else{
			
		
	
		
		
//Test to see if the form is completed or not
if( $print_again == false ) 
	{
	// Do whats needed to complete the module
	
	//if ($PayOnline == true ) { Goto_Paypal(); }//Goto_Paypal()
	Completed_Form(); // If passed all tests the complete it and move on
	//GotoThankYou();
	//ErrorMsg( "Email Sending" );
	} 
	else 
	{
	//ErrorMsg( "Check Form Failed" );
	print_form(); //If failed at any point then display the form again
	}

} // end function check_form

function print_form()
{
global $Usermail;
global $OldPwd,$OldMD5;
global $NewPwd,$ConfirmPwd,$NewMD5;

global $error;


//ErrorMsg( "Print form Started, Checkbox Value " . $Cheques );
//ErrorMsg( " Print Form: TestDestination = " . $TestDestination . "\n\n");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Reset Password</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<link href="stylesheet/Style1.css" rel="stylesheet" type="text/css" />
</head>

<body>


<div align="center">
 

		<!-- The login box snd options-->
		<form action="<? echo($PHP_SELF) ?>" method="POST" >  <!--style="text-align:left"-->  
		<table width="500" border="0" cellspacing="0" cellpadding="0">
  		<tr height="100">
    		<td width = "134" >&nbsp;</td>
    		<td width = "360">&nbsp;</td>
  		</tr>
  		<tr>
   		 	<td colspan="2" align="centre"><p class="header">Resetting current password<p></td>
   		 	
            
 		 </tr>
 		 <tr>
   		 	<td align="centre"><p>Email</p></td>
    		<td><input type="text" size="60" maxlength="50" name="loginid" id="loginid" value = <? echo $Usermail; ?> /></td>
  		</tr>
  		<tr>
    		<td align="middle"><p>Old Password</p></td>
    		<td><input type="text" size="20" maxlength="10" name="oldpwdstr" id ="oldpwdstr" value = <? echo $OldPwd; ?> /></td>
  		</tr>
  		<tr>
    		<td align="middle"><p>New Password<p></td>
    		<td><input type="text" size="20" maxlength="10" name="newpwdstr" id = "newpwdstr" value= <? echo $NewPwd; ?>  /></td>
  		</tr>
  		<tr>
    		<td align="middle"><p>Confirm</p></td>
    		<td><input type="text" size="20" maxlength="10" name="confirmpwdstr" id = "confirmpwdstr" value = <? echo $ConfirmPwd; ?> /></td>
  		</tr>
  		<tr>
    		<td>&nbsp;</td>
    		<td><a href="ResetPwd.php">Reset Password</a></td>
  		</tr>
		</table>
        </form>


</div> <!-- End of Wrap -->
</body>
</html>
<? //End of Printform

}
