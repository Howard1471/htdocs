<?php
//Login1.php
// Check Username for existence
// Add user registration if OK
// Check Users Password

$User = $_POST['Username'];
$PWord = $_POST['Password'];
$PVerify = $_POST['PasswordVerify'];
$Email = $_POST['EmailAddress'];
$LoginSelect = $_POST['Login'];
$RegisterSelect = $_POST['Register'];
$DataStr;

include ( "LoginFunctions.php" );

function VerifyPasswords($PWord, $PVerify)
{
//print "\nChecking Passowrds - $PWord and $PVerify \n<br>";
	
if ($PWord == $PVerify)
	{
	return true;
	}
	else
	{
	return false;
	}
}

/***************************************************************************/
// Main process of this page
/***************************************************************************/
CreateUserlistFile();
if (isset($LoginSelect))
{
// Do Login
//print "Login $DataStr \n<br>";
if ( CheckUsername( $User ) <> 0 )
		{
		$PWordHash = MD5( $PWord );
		$UserPwd = FetchPassword ( $User );
		print "\n Comparing passwords - \n<br>$PWordHash \n<br>$UserPwd \n<br>";
		}

}
else
if(isset($RegisterSelect))
{
// Do Registration
if ( VerifyPasswords($PWord, $PVerify) == false )
	{
	//print " Passowrds - $PWord and $PVerify - dont match \n,br.";
	header ('Location: http://www.howardkeene.co.uk/Chatroom/passwords_error_page.htm');
	}
	

$PWord = CreateAuthentication( $Email );
//print "\nChecking $User against the file \n<br>";
	if ( CheckUsername( $User ) == 0 )
		{
		//print "\nUser doesn't already exist \nChecking Email Address. \n<br>";
		if ( ValidateEmailAddr( $Email ) ) //If Email address ok
			{
			$DataStr=CreateDataStr ($User,$Email,$PWord,"N",date("d/m/Y"));
			AppendDataToFile( $DataStr);
			Mail_Registration( $DataStr );
			//print "Register $DataStr \n<br>";
			//print "\nSend and email to - $Email \n<br>";
			}
			else
			{
			header ('Location: http://www.howardkeene.co.uk/Chatroom/email_error_page.htm');
			//Email address not good, goto error page
			}//End of ValidateEmailAddr
			
		}
		else
		{
		header ('Location: http://www.howardkeene.co.uk/Chatroom/user_error_page.htm?Username=$User');
		
		//print "\n $User is already registered \n<br>";
		}//End of CheckUsername
}




?>