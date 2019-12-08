<?php
global $NameData, $FromData, $TelData ,$EmailData, $TitleData, $CommentData, $FilePrefix, $UploadData, $LiveData;
global $HostSite, $DetailFile, $CommentFile, $TestimonialFile;
global $Target_root, $Target_root1, $Target_root2,$Host_URL;

$Destination = "zerina-ashab@hotmail.co.uk"; // i.e. "martingnaylor@hotmail.com"; "howard@howardkeene.co.uk"; //
$Source = "@mhn-ltd.com"; //Email Address in Website itself
$Blindcc = "howard@howardkeene.co.uk"; //For tracking purposes
$Website = "www.mhn-ltd.com";
$CCAddr = "";

function Mail_Time()
{
	return date("d/m/Y G:i" , time() );
}

function Mail_HTMLSender( $FromAddr ,$EmailAddress, $CCEmail, $BCCEmail, $subject, $message )
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


--PHP-alt-<?php echo $random_hash; ?>--
<?
//copy current buffer contents into $message variable and delete current output buffer
$message = ob_get_clean();
//send the email
//Mail_Sender( $name,  $Source, $Destination, $CCAddr, $Blindcc, "Contact Message from " . $Website , $OutgoingMsg );
$mail_sent = @mail( $to, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
//echo $mail_sent ? "Mail sent" : "Mail failed";

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
	if ( $test = substr( $Email_Addr, -3 ) == ".us") { $Addr_Flag2 = True;}
	if ( $test = substr( $Email_Addr, -4 ) == ".com") { $Addr_Flag2 = True;}
	if ( $test = substr( $Email_Addr, -4 ) == ".net") { $Addr_Flag2 = True;}
	if ( $test = substr( $Email_Addr, -4 ) == ".org") { $Addr_Flag2 = True;}
	if ( $test = substr( $Email_Addr, -4 ) == ".biz") { $Addr_Flag2 = True;}
	if ( $test = substr( $Email_Addr, -3 ) == ".fr") { $Addr_Flag2 = True;}
	if ( $test = substr( $Email_Addr, -3 ) == ".au") { $Addr_Flag2 = True;}

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


?>