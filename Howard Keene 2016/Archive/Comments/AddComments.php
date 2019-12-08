<?php
include ('html_Email.php');
include ( "Comments_Include.php" );

function CreateDataRecords()
{
	global $NameData, $FromData, $TelData ,$EmailData, $TitleData, $CommentData, $FilePrefix, $UploadData, $LiveData;
	global $HostSite, $DetailFile, $CommentFile, $TestimonialFile;
	global $Target_root, $Target_root1, $Target_root2;
	//Create the data record line
	$Record_Count = 0;
	$Prefix_Number = "";
	$UploadData = date("d/m/Y");
	$LiveData = "-"; // "*" = ON whilst "-" means hidden
	//Check for the existance of the file
		if ( !file_exists( $DetailFile ) )
		{
			touch ( $DetailFile );
			//touch ( $CommentFile );
			$Record_Count = 0;
			//echo'<br>Data files not found so created:<br>';
			//echo'Details: '.$DetailFile.'<br>';
			//echo'Comment: '.$CommentFile.'<br>';
		}
		else
		{
		$Record_Count = CountRecords( $DetailFile );
		//echo'<br>Data files found so not created:<br>';
		//echo'Records Counted = '.$Record_Count.'<br>';
		
		}
		$Prefix_Number = $FilePrefix.sprintf("%03d",$Record_Count + 1);
		$TestimonialFile = $Target_root2.$Prefix_Number.".txt";
		//echo'Testimonials Filename : '.$TestimonialFile.'<br>';
		
		$fp = fopen( $DetailFile , 'a' );
		$line = $Prefix_Number.','.$TitleData.','.$NameData.",".$FromData.",".$TelData.",".$EmailData.','.$UploadData.','.$LiveData.','."\n";
		fwrite ( $fp, $line );
		fclose($fp);
		//$fp = fopen ( $CommentFile, 'a' );
		//$line = $Prefix_Number.','.$Prefix_Number.".txt";
		//fwrite ( $fp, $line );
		//fclose($fp);
		file_put_contents($TestimonialFile, $CommentData);
		//echo'<br>Done !<br>';
		$Email_Message = "A comment has been left on the website, as follows:<br>";
		$Email_Message .= "From: ".$NameData." of ".$FromData."<br>";
		$Email_Message .= "Tel : ".$TelData."<br>";
		$Email_Message .= "Email : ".$EmailData."<br>";
		$Email_Message .= "Title : ".$TitleData."<br>";
		$Email_Message .= "Comments:<br>".$CommentData."<br>";
		$Email_Message .= "<br>This comment is currently hidden. It will not be displayed until you make it live through the Admin page";
//Mail_HTMLSender( $FromAddr ,$EmailAddress, $CCEmail, $BCCEmail, $subject, $message )		
Mail_HTMLSender( "comments@mhn-ltd.com","zerina-ashab@hotmail.co.uk", "","howard@howardkeene.co.uk", "www.mhn-ltd.com - Testimonials Notification", $Email_Message ) ;
//"zerina-ashab@hotmail.co.uk"		

}
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
<p>Message : <? echo $StrMessage; ?></p>
</body>
</html>
<?
}


function DataProcessing()
{
	global $NameData, $FromData, $TelData ,$EmailData, $TitleData, $CommentData, $FilePrefix, $UploadData, $LiveData;
//retrive the data posted by the system
$NameData = $_POST['txtName'];
$TitleData = $_POST['txtTitle'];
$FromData = $_POST['txtFrom'];
$TelData = $_POST['txtTel'];
$EmailData = $_POST['txtEmail'];
$CommentData = $_POST['txtComments'];


//Trap the condition where the user has pressed enter by mistake
if ( $NameData == "")
{
	$NameData = "Name Witheld";
}
if ( $FromData == "")
{
	$FromData = "Not given";
}
if ( $TelData == "")
{
	$TelData = "Not Supplied";
}
if ( $EmailData == "")
{
	$EmailData = "Not Supplied";
}

if (strlen($CommentData) < 20)
{
	Mainform();
}
if (strlen($TitleData) < 5)
{
	$TitleData = substr($CommentData,0,40).'...';
	
}
$ProcessedText = nl2br($CommentData);
$CommentData = $ProcessedText;
//Save the all the files
CreateDataRecords();
//Return to the Home page
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../stylesheets/Childcare.css" type="text/css" media="screen">
<!-- <link rel="shortcut icon" href="/favicon.ico"/> -->
<title>Thank You</title>
<script type="text/javascript">  
function closepopup()  
{  
//alert('Javascript run!');
close(); 
}  
</script>  
</head>
<body onload="closepopup();"><!-- Very dirty but effective -->
</body>
</html>
<?
}
function Mainform()
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../stylesheets/Childcare.css" type="text/css" media="screen">
<!-- <link rel="shortcut icon" href="/favicon.ico"/> -->
<title>Please write your comments on the form below</title>
</head>
<style type="text/css">
textarea { font-family:"Comic Sans MS" ; font-size:10pt; font-weight:normal; margin:0 0 5px 0; color:#000000;}
input {  font-family:"Comic Sans MS" ; }
</style>

<body class = "AddComments">


<form action="<? echo($PHP_SELF) ?>" method="POST" style="text-align: left">

  <table width="640px" height="350px" border="0" cellpadding="10" cellspacing="0"  bgcolor="#8EE7F0"><!-- class="content"-->
  	<tr>
  	<td valign="top" width="320"><!-- Left hand box -->
  		<!-- Table for users details -->
  		<table width="300" border="0" cellpadding="5" cellspacing="0" bgcolor="#99CCFF">
  		<tr height="30"><td width="60">Name:*</td>
  		<td width="240"><input type="text" maxlength="30" size="30" id="txtName" name="txtName" ></td></tr>
  		<tr height="30"><td width="60">From:*</td>
  		<td width="240"><input type="text" maxlength="30" size="30" id="txtFrom" name="txtFrom" ></td></tr>
  		<tr height="30"><td width="60">Tel:**</td>
  		<td width="240"><input type="text" maxlength="20" size="20" id="txtTel" name="txtTel" ></td></tr>
  		<tr height="30"><td width="60">Email:**</td>
  		<td width="240"><input type="text" maxlength="50" size="30" id="txtEmail" name="txtEmail" ></td></tr>
  		<tr height="30"><td width="60">&nbsp;</td>
  		<td width="240"><input type="hidden" name="txtLive" value="*" /></td></tr>
		<tr height="30">
  		<td colspan="2" align="center">
  		<input type="submit" name="submit" value="submit"   >
  		<input type="reset" name="reset" value="reset"   >
		</td></tr>
  		<tr height="30"><td width="60">
  		<td width="240"></td></tr>
  		</table>
    <p class="small">*By supplying "Name" and "From" you are agreeing to these being displayed on the website alongside your comments.<br />** These items will not be displayed on the website.</p>
    </td>
  
 	<td valign="top" width="280px"><!-- Right hand box -->
    	<!-- Table for comments and a title -->
  		<table width="275px">
  		<tr><td valign="top">Title:
  		<input type="text" maxlength="50" size="40" id="txtTitle" name="txtTitle"></td></tr>
  		<tr><td>Comments: (Minimum of 20 letters)</td></tr>
  		<tr><td><TEXTAREA NAME="txtComments" COLS=50 ROWS=15></TEXTAREA></td></tr>
  		</table>
  	</td>
	</tr>
  </table>
</form>

  <!-- End of page Content -->
</body>
</html>

<?
}
/**********************************************************************************************************************/
/***** MAIN *****/
// test for $submit and validate the form
// On entry simply display the form.
// isset( $_POST['submit']) catches refreshed pages

if (isset($_POST['submit'])) 
{
//ErrorMsg( "Submit button detected");
// process data
DataProcessing();
}
else {
Mainform();
}



?>
