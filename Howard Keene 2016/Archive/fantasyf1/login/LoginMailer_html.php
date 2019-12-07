<?php
global $Destination, $Source, $Blindcc, $Website,  $captchafield, $code, $possibles, $try_again, $captchatxt;
global $name, $email, $confirm, $messagetext, $TestDestination;

$Destination = ""; //This could be the users email
$TestDestination = "howard@thekeenefamily.plus.com";
$Source = ""; //NEDS TO BE SET UP
$Blindcc = "";
$Website = "Howies F1 League";
$CCAddr = "";

function Mail_Time()
{
	return date("d/m/Y G:i" , time() );
}
//*************************************************************************************************************************
function Mail_HTMLSender( $Name, $FromAddr ,$EmailAddress, $CCEmail, $BCCEmail, $subject, $message )
{
//define the receiver of the email
$to = $EmailAddress;
//define the subject of the email
//$subject = 'Test HTML email'; 
//create a boundary string. It must be unique 
//so we use the MD5 algorithm to generate a random hash
$random_hash = md5(date('r', time())); 
//define the headers we want passed. Note that they are separated with \r\n
$headers = 'From: ' . $FromAddr . "\r\n" ;
$headers .= 'Cc: ' . $CCEmail . "\r\n"; // CC the senders address
$headers .= 'Bcc: ' . $BCCEmail . "\r\n"; // BCC if needed
//add boundary string and mime type specification
$headers .= "Content-Type: multipart/alternative; boundary=\"PHP-alt-".$random_hash."\""; 
//define the body of the message.
ob_start(); //Turn on output buffering
?>
--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/plain; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

<?php echo $message; ?>

--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/html; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

<p><?php echo $message; ?></p> 
<h2>Regards</h2>

--PHP-alt-<?php echo $random_hash; ?>--
<?
//copy current buffer contents into $message variable and delete current output buffer
$message = ob_get_clean();
//send the email
//Mail_Sender( $name,  $Source, $Destination, $CCAddr, $Blindcc, "Contact Message from " . $Website , $OutgoingMsg );
$mail_sent = @mail( $to, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
//echo $mail_sent ? "Mail sent" : "Mail failed";
//**************************************************************************************************************************
}
function Mail_Sender( $Name, $FromAddr ,$EmailAddress, $CCEmail, $BCCEmail, $subject, $message )
{
	global $Destination, $Source, $Blindcc;

	//$Email_Time = CreateGMT();
	//$to = "office@thekeenefamily.plus.com"; martingnaylor@hotmail.com terriandmartin@btinternet.com// test address
    //$to = $Destination;
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
	$headers = 'From: ' . $FromAddr . "\r\n" ;
    $headers .= 'Cc: ' . $CCEmail . "\r\n"; // CC the senders address
	$headers .= 'Bcc: ' . $BCCEmail . "\r\n"; // BCC if needed
	// . "\r\n" . "Reply-To: info@secretsofhightower.org" . "\r\n" . "X-Mailer: PHP/" . phpversion();
	if (mail($EmailAddress, $subject, $message, $headers )) 
	{ 
	//ErrorMsg( 'To: ' . $to );
	}
    else 
	{ ErrorMsg( "Mail did not succeed"); }
	
}
function Mail_AttachSender()
{
 
//define the receiver of the email 
$to = 'youraddress@example.com'; 
//define the subject of the email 
$subject = 'Test email with attachment'; 
//create a boundary string. It must be unique 
//so we use the MD5 algorithm to generate a random hash 
$random_hash = md5(date('r', time())); 
//define the headers we want passed. Note that they are separated with \r\n 
$headers = "From: webmaster@example.com\r\nReply-To: webmaster@example.com"; 
//add boundary string and mime type specification 
$headers .= "\r\nContent-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\""; 
//read the atachment file contents into a string,
//encode it with MIME base64,
//and split it into smaller chunks
$attachment = chunk_split(base64_encode(file_get_contents('attachment.zip'))); 
//define the body of the message. 
ob_start(); //Turn on output buffering 
?> 
--PHP-mixed-<?php echo $random_hash; ?>  
Content-Type: multipart/alternative; boundary="PHP-alt-<?php echo $random_hash; ?>" 

--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/plain; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

Hello World!!! 
This is simple text email message. 

--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/html; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

<h2>Hello World!</h2> 
<p>This is something with <b>HTML</b> formatting.</p> 

--PHP-alt-<?php echo $random_hash; ?>-- 

--PHP-mixed-<?php echo $random_hash; ?>  
Content-Type: application/zip; name="attachment.zip"  
Content-Transfer-Encoding: base64  
Content-Disposition: attachment  

<?php echo $attachment; ?> 
--PHP-mixed-<?php echo $random_hash; ?>-- 

<?php 
//copy current buffer contents into $message variable and delete current output buffer 
$message = ob_get_clean(); 
//send the email 
$mail_sent = @mail( $to, $subject, $message, $headers ); 
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
//echo $mail_sent ? "Mail sent" : "Mail failed"; 

}
function Mail_SendOrder()
{
global $Qty, $Cost, $Postage, $Total, $Username, $UserAddr, $UserEmail, $Price;

// GBP as international coding may mess up the pound sign
$message = $Username;
$message .= " has placed an order for Secrets of Hightower by M.G.Naylor \n";
$message .= "\nThe details are as follows\n";
$message .= $Qty." copies @ GBP " . sprintf("%.2f",$Price)."                           GBP ".sprintf("%.2f",$Cost)."\n";
$message .= "Post and Packing                              GBP ".sprintf("%.2f",$Postage)."\n";
$message .= "Total for this order                          GBP ".sprintf("%.2f",$Total)."\n";
$message .= "\n";
$message .= "Delivery Details:-\n";
$message .= $Username."\n";
$message .= $UserAddr."\n";
$message .= $UserEmail."\n";
$message .= "\n\nThank You for your order\n";
Mail_Sender( $Username, $UserEmail, "Secrets of Hightower - Online purchase", $message );

//rebuild message for HTML output

/*$message = $Username;
$message .= "\nhas placed an order for Secrets of Hightower by M.G.Naylor \n";
$message .= "The details are as follows\n";
$message .= $Qty." copies @ &pound;". sprintf("%.2f",$Price)." - &pound;".sprintf("%.2f",$Cost)."\n";
$message .= "Post and Packing &pound;".sprintf("%.2f",$Postage)."\n";
$message .= "Total for this order &pound;".sprintf("%.2f",$Total)."\n";
$message .= "\n";
$message .= "Delivery Details:-\n";
$message .= $Username."\n";
$message .= $UserAddr."\n";
$message .= $UserEmail."\n";
$message .= "\n\nThank You for your order\n";
print "Message sent - ".nl2br($message);
*/

}
function ValidateEmailAddr( $Email_Addr )
{
//Returns true if ok
$Addr_Flag = False;
$Addr_Flag2 = False;
$Addr_Len = strlen( $Email_Addr );
$Position = strpos( $Email_Addr, "@");

	if ( strlen($Email_Addr) > 5)
	{
	$Email_Addr = strtolower( $Email_Addr );
	//print "Email Address , $Email_Addr, ";
		if ( strstr( $Email_Addr, "@") ){ $Addr_Flag = True;} // contains '@'
		// if ( Position == 0 ) { $Addr_Flag = False; }
	if ( Position == strlen($Email_Addr)-1 ) {$Addr_Flag = False;}
	if ( $test = substr( $Email_Addr, -3 ) == ".uk") { $Addr_Flag2 = True;}
	//if ( $test = substr( $Email_Addr, -6 ) == ".co.uk") { $Addr_Flag2 = True;}
	if ( $test = substr( $Email_Addr, -3 ) == ".us") { $Addr_Flag2 = True;}
	if ( $test = substr( $Email_Addr, -4 ) == ".com") { $Addr_Flag2 = True;}
	if ( $test = substr( $Email_Addr, -4 ) == ".net") { $Addr_Flag2 = True;}
	if ( $test = substr( $Email_Addr, -4 ) == ".org") { $Addr_Flag2 = True;}
	if ( $test = substr( $Email_Addr, -4 ) == ".biz") { $Addr_Flag2 = True;}
	if ( $test = substr( $Email_Addr, -3 ) == ".fr") { $Addr_Flag2 = True;}
	if ( $test = substr( $Email_Addr, -3 ) == ".au") { $Addr_Flag2 = True;}
	if ( $test = substr( $Email_Addr, -3 ) == ".me") { $Addr_Flag2 = True;}

	$Ret_Value = False;
		if  (( $Addr_Flag == True)  AND ( $Addr_Flag2 == True )) 
		{ $Ret_Value = True; 
		//print "Email Valid OK, \n";
		}
		else
		{ 
		//print "Email Valid fail, "; 
		}
	return $Ret_Value;
	}
}
function ErrorMsg( $StrMessage )
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MartinGNaylor</title>
<link rel="stylesheet" href="Stylesheets/Style1.css" type="text/css" media="screen" />
</head>
<body>
<p>Message : <? echo $StrMessage; ?></p>
</body>
</html>
<?
}


?>