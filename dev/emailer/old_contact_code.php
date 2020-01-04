<?php
include("EmailHandler.php");

/***********   MAIN   ******************************/
// test for $submit and validate the form
// On entry simply display the form.
// isset( $_POST['refresh']) catches refreshed pages
//ErrorMsg( "Testing Button input - *");

$Form_Checked = false;
if(isset($_POST['submit1']))
	{
	//ErrorMsg( "Submit Button detected");
	Check_Form();
	$Form_Checked = true;
	//GotoEmailOnly();
	//ErrorMsg( "Check Form Done");
	//Goto_Paypal();
	}
if (isset($_POST['reset1']))
	{
	//ErrorMsg( "Refresh button detected");
	BlankFields();
	Contact_Form(); 
	}
else
	{
	if ($Form_Checked == false) { 
		//ErrorMsg( "No buttons detected");
		BlankFields();
		Contact_Form(); 
		}	
	}
/***************************************************/


global $captchatxt, $code;
function ErrorMsg( $StrMessage )
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Emailer</title>
<link rel="stylesheet" href="Stylesheets/Style1.css" type="text/css" media="screen" />
</head>
<body>
<p>Message : <?php echo $StrMessage; ?></p>
</body>
</html>
<?php
}

function CreateCaptcha()
{
global $code, $captchatxt;
$possibles = '23456789bcdfghjkmnpqrstvwxyzBCDFGHJKMNPQRSTVWXY';	
$length = 0;
$options = strlen($possibles)-1;
$code = "";
$length = rand(5,7);
for ($i=0; $i <= $length - 1; $i++ )
	{
	$code .= $possibles[rand(0,$options)];
	}
	//$code[$length] = '\0';
	$captchatxt = $code;
return $code;		
}
function CreateCaptchBgnd()
{
$possibles = '0123456789';
$BaseName = 'captchabgnd' . $possibles[rand(1,6)] . '.jpg';
return $BaseName;
}
function error_flag($error, $field) 
{
if ($error[$field]) 
	{
	print  '<p class="error">' ; //css class sets the colour
	} else {
	print "<p>" ;
	}
} //end function error_flag
function BlankFields()
{
global $error, $name, $email, $confirm, $messagetext, $captchafield, $code, $possibles, $captchatxt	;

$name = "";
$email = "";
$confirm = "";
$messagetext = "";
$captchafield = "";
$error['name'] = false;
$error['email'] = false;
$error['confirm'] = false;
$error['messagetext'] = false;
$error['captchafield'] = false;
$error['captchatxt'] = false;

}
function check_form() 
{
global $error, $name, $email, $confirm, $messagetext, $captchafield, $code, $possibles, $try_again, $captchatxt;

$error['name'] = false;
$error['email'] = false;
$error['confirm'] = false;
$error['messagetext'] = false;
$error['captchafield'] = false;
$error['captchatxt'] = false;

$name= $_POST['name'];
$email= $_POST['email'];
$confirm = $_POST['confirm'];
$messagetext = $_POST['messagetext'];


$try_again = false;

//	Error_page();
	//ErrorMsg("Check Form" );
//	End_Error_page();


	if ($name == "" ) 
		{
		$error['name'] = true;
		$try_again = true;
		//ErrorMsg("No name Provided ") ;
		}
	if (ValidateEmailAddr( $email ) == false ) 
		{
		$error['email'] = true;
		$try_again = true;
		//ErrorMsg("Email Doesnt Validate");
		}
	if ($email != $confirm ) 
		{
		$error['confirm'] = true;
		$error['email'] = true;
		$try_again = true;
		//ErrorMsg("Emails dont match" );

		}
/*	if ($captchafield == "")
		{
		$error['captchafield'] = true;
		$try_again = true;
		ErrorMsg( "Captcha_Field is blank" );
		}
	if ($captchafield != $captchatxt)
		{
		$error['captchafield'] = true;
		$try_again = true;
		ErrorMsg( "Captcha_Field is incorrect - " . $captchafield . " >> " . $captchatxt . "\n" );
		}
*/
//Test to see if the form is completed or not
if( $try_again == false ) 
	{
	Completed_Form();
	Mail_ContactForm(); // If passed all tests Send the Email
	
	} 
	else 
	{
	//CreateCaptcha();
	Contact_form(); //If failed at any point then display the form again
	}

} // end function check_form

//The main form is placed here
function Contact_Form()
{
global $error, $name, $email, $confirm, $messagetext, $captchafield, $code, $possibles, $captchatxt	;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact Martin G Naylor</title>
<link href="Stylesheets/Style1.css" rel="stylesheet" type="text/css" />
<style>
.error {color: #FF0000}
</style>
</head>

<body>
<div id="wrap">

<div id="header"> <!-- TemplateBeginEditable name="EditStyle" -->
<img src="images/home_header.gif" usemap="#Header"  />
<!-- TemplateEndEditable -->
</div> <!-- End of header -->
<div id="leftside"> </div>
<div id="content"> <!-- Set Form to refresh this page -->
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post"  > <!--style="text-align: left"-->
  <table width= "800px" height="500px" border="0" cellpadding="10" cellspacing="0" align="center"><tr><td>
    <table width="760px" border="0" cellspacing="0" cellpadding="0" >
      <tr>
        <td colspan="2">
          <table width="760px" border="0" cellspacing="0" cellpadding="0" >
            <tr><td width="180px">&nbsp;</td>
              <td width="400px">
                <p>Complete the details requested below and click on 'Submit'.  Your message will be sent to Martin who will respond to it as soon as he can.</p>
                </td><td width="180px">&nbsp;</td></tr>
            </table>
          </td>
        </tr>
  <!-- Name -->
      <tr>
        <td height="30px" width="130px"><?php error_flag($error, "name"); ?>Name</td>
        <td width="650px"><input name="name" id="name" type="text" size="30" maxlength="30" value="<?php echo $name; ?>" /></td>
        </tr>
  <!-- Email Address-->  	
      <tr>
        <td height="30px" ><?php error_flag($error, "email"); ?>Email</td>
        <td><input name="email" id="email" type="text" size="40" maxlength="40" value="<?php echo $email; ?>" /></td>
        </tr>
  <!--Confirmation-->    
      <tr>
        <td height="30px" ><?php error_flag($error, "confirm"); ?>Confirm Email</td>
        <td><input name="confirm" id="confirm" type="text" size="40" maxlength="430" value="<?php echo $confirm; ?>" /></td>
        </tr>
  <!-- Message-->  
      <tr>
        <td height="150px" valign="top"><?php error_flag($error, "messagetext"); ?>Message</td>
        <td valign="top">
          <textarea name="messagetext" id="messagetext" cols="70" rows="5" ><?php echo $messagetext; ?></textarea>
          </td>
        </tr>
      
      <tr>
        <!-- Put the Captcha code in here -->
        <td colspan = "2" align="center">
          
          </td>
        </tr>
      
      <tr><td colspan="2">
        <!-- Button Table -->
        <table width="760px" height="100px" border="0" cellpadding="0" cellspacing="0"><tr>
          <!-- <input type="image" name="submit" src="images/BuyNowButton.gif" value="submit"/> -->
          <td height="80px" width = "380px" align="right">
          <input name="submit1" type="submit" value="submit"  /> </td>
          <td height="80px" align="left">
          <input name="reset1" type="reset"  value="reset"/></td>
          </tr></table>
        </td></tr>
      </table>
    </td></tr></table>
</form>
</div>
<div id="rightside"> 
.
</div>

<div id="footer"> </div>
</div>
<map name= "Header" id="Header">
<area alt="home" title="home" target="_self" shape="polygon" coords="895,40,922,15,945,20,965,40,965,70,920,85,895,55" href="home.php"  />
</map>
</body>
</html>
<?php
}

function Completed_Form() //Thank you message
{

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Contact Martin G Naylor</title>
<!-- InstanceEndEditable -->
<link href="Stylesheets/Style1.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<div id="wrap">

<div id="header">
<!-- InstanceBeginEditable name="Header" -->
<img src="images/home_header.gif" usemap="#Header"  />
<!-- InstanceEndEditable -->
</div> <!-- End of header -->
<div id="leftside">
<!-- InstanceBeginEditable name="Leftside" -->

<!-- InstanceEndEditable -->
</div>
<div id="content">
<!-- InstanceBeginEditable name="Content" -->

<!-- Set Form to call website index Page -->
<form action="home.php" style="text-align: left">
<table width= "800px" height="550px" border="0" cellpadding="10" cellspacing="0" align="center"><tr><td>
	<table width="760px" border="0" cellspacing="0" cellpadding="0" >
	<tr>
    	<td align="center" >
        	<h1>Thank You</h1>
            
  		</td>
    </tr>
    <tr>
    <td height="80px" align = "center" colspan="2">
      <a href="home.php" ><img src="images/Button_silver_home.gif" alt="Thank you" width="150" height="49" /></a>
	</td>
    
  </tr>
		</table>
 </td></tr></table>
</form>
<!-- InstanceEndEditable -->
</div>
<div id="rightside">
<!-- InstanceBeginEditable name="Rightside" -->

<!-- InstanceEndEditable -->
</div>

<div id="footer">
<!-- InstanceBeginEditable name="Footer" -->
<map name= "Header" id="Header">
<area alt="home" title="home" target="_self" shape="polygon" coords="895,40,922,15,945,20,965,40,965,70,920,85,895,55" href="home.php"  />
</map>
<!-- InstanceEndEditable -->
</div>
</div>
</body>
<!-- InstanceEnd --></html>
<?php
}	
/**********************************************************************************************************************/


