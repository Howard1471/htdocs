<!DOCTYPE html PUBLIC
	"-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php

$User = $_GET['Username'];

?>
<html>

<head>
<meta http-equiv="Content-Language" content="en-gb">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta HTTP-EQUIV="Refresh" CONTENT="5; URL= Login1.htm">

<title>Error Page</title>
</head>

<body>

<h6><font size="7">Error Page</font></h6>
<p>&nbsp;</p>
<p><?php print "You've come here because the username $User already exists\n<br>" ?> </p>
<p>&nbsp;</p>
<p>You'll be redirected to the login pages shortly</p>
<p>&nbsp;</p>

</body>

</html>
