<?php
/* Schema variables.

Reference this file as 

include ( "Table_Schemas.php" );

*/

$Register_Schema = "
URef INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
Name VARCHAR (30) NOT NULL, 
DOB varchar (10) NOT NULL, 
Password VARCHAR (12) NOT NULL,
Approval BOOL,
Priviledge TINYINT UNSIGNED
";



?>