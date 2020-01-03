<?php

global $client_website;

include "../core/Constants.php";

class EmailHandler
{

    protected $Destination = EMAILER_DESTINATION;
    protected $TestDestination = EMAILER_TEST;
    protected $Source = EMAILER_SOURCE;
    protected $Blindcc = EMAILER_BCC;
    protected $Website = EMAILER_URL;
    protected $CCAddr = EMAILER_CC;

    protected $name;
    protected $email;
    protected $subject;
    protected $messagetext;
    protected $timestamp;
    protected $random_hash;
    protected $headers;

    public function __construct($contactName, $contactEmail, $contactSubject ,$contactMessage)
    {
        $this->name = $contactName;
        $this->email = $contactEmail;
        $this->subject = $contactSubject;
        $this->messagetext = $contactMessage;
    }


    protected function Mail_Time()
    {
        return date("d/m/Y G:i", time());
    }
    protected function makeHeaders()
    {
        $this->headers = 'From: ' . $this->Source . "\r\n";
        $this->headers .= 'Cc: ' . $this->CCAddr . "\r\n"; // CC the senders address
        $this->headers .= 'Bcc: ' . $this->Blindcc . "\r\n"; // BCC if needed
    }
    public function Mail_Sender()
    {

//This function will mail the contact form only

        $hostMessage = "";
        $UsersMessage = "";
        $hostHTML = "";
        $UsersHTML = "";
        $this->timestamp = $this->Mail_Time();
        $highlited = "";
        $normaltext = "";
        $ReplyAddr = "Reply-To:" . $this->email . "\r\n";

//Set up headers
        $to = $this->TestDestination;
        $this->makeHeaders();

        $this->random_hash = md5(date('r', time()));
        $typeHeaders = "Content-Type: multipart/alternative; boundary=\"PHP-alt-" . $this->random_hash . "\"";

        // * hosts Copy
        // Subject line
        //$subject = "Contact Message from " . $this->Website;
        // create message text to send
//        $hostMessage = $this->name;
//        $hostMessage .= " has sent you a message via the website.\n\n";
        $highlited = $this->name. " has sent you a message via the website.\n\n";

        $normaltext .= "The message is as follows:\n";
        $normaltext .= $this->messagetext . "\n\n";
        $normaltext .= "Message sent at " . $this->timestamp . "\n\n";
        $normaltext .= "Reply will go to " . $this->email . "\n\n";

        $hostMessage = $highlited.$normaltext;
        $hostHTML = nl2br($normaltext);

        //If this is still under test, do not send actual mail
        if ($_SERVER['SERVER_NAME'] == "localhost") {
            $this->FakeMailer($to, $this->Source, $this->CCAddr, $this->Blindcc, $this->subject, $hostHTML);
            return;
        }
    // $to, $from, $cc, $bcc, $subject, $message

        ob_start(); //Turn on output buffering
        ?>
        --PHP-alt-<?php echo $this->random_hash; ?>
        Content-Type: text/plain; charset="iso-8859-1"
        Content-Transfer-Encoding: 7bit

        <?php echo $hostMessage; ?>

        --PHP-alt-<?php echo $this->random_hash; ?>
        Content-Type: text/html; charset="iso-8859-1"
        Content-Transfer-Encoding: 7bit

        <h2><?php echo $highlited; ?></h2>
        <p><?php echo $hostHTML; ?></p>
        </br>


        --PHP-alt-<?php echo $this->random_hash; ?>--
        <?php
        //copy current buffer contents into $message variable and delete current output buffer
        $message = ob_get_clean();

        //send the email
        //Mail_Sender( $name,  $Source, $Destination, $CCAddr, $Blindcc, "Contact Message from " . $Website , $OutgoingMsg );
        //mail($to_email_address,$subject,$message,[$headers],[$parameters]);
         "Reply-To:" . $this->email . "\r\n";
        $mail_sent = mail($to, $this->subject, $message, $this->headers . $ReplyAddr . $typeHeaders);
        //if the message is sent successfully print "Mail sent". Otherwise print "Mail failed"
        dd($mail_sent ? " Mail sent - " : " Mail failed - ");

    }


}
