<?php
// Check to see if $_SERVER[PHP_AUTH_USER] already contains info
if (!isset($_SERVER[PHP_AUTH_USER])) {
     // If empty, send header causing dialog box to appear
     header('WWW-Authenticate: Basic realm="My Private Stuff"'); 
header('HTTP/1.0 401 Unauthorized');
     echo 'Authorization Required.';
     exit;
} else {
     // If not empty, do something else
     // create connection; substitute your own information!
     $conn = mysql_connect("localhost","joeuser","34Nhjp") or
die(mysql_error());
     // select database; substitute your own database name
     $db = mysql_select_db("MyDB", $conn) or die(mysql_error());
     // formulate and execute the query
     $sql = "SELECT id FROM users WHERE
username='$_SERVER[PHP_AUTH_USER]' and password=
password('$_SERVER[PHP_AUTH_PW]')";
     $result = mysql_query($sql) or die (mysql_error());

// Present results based on validity, by counting rows.
     if (mysql_num_rows($result) == 1) {
          echo "<P>You are a valid user!<br>";
echo "You entered a username of $_SERVER[PHP_AUTH_USER] and a password
of $_SERVER[PHP_AUTH_PW]</P>";
     } else {
          echo "You are not authorized!";
     }
)
?>