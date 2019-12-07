<?php
global $MySQLServer, $MySQLUsername, $MySQLPassword, $Link;

$MySQLServer = 'mysql12.freehostia.com';
$MySQLUsername = 'howkee_test2db';
$MySQLPassword = 'Pr10r1ty'; 
$Tablename = 'Test';

//Function list

//Open the registration table and return a link.
function SQLSetupLink()
{
global $MySQLServer, $MySQLUsername, $MySQLPassword, $Link;
$link = mysql_connect($MySQLServer, $MySQLUsername, $MySQLPassword);
}
//Open the Database Table
function SQLSetupDB()
{
global $MySQLServer, $MySQLUsername, $MySQLPassword, $Link;
$db_selected = NULL;
if (!$Link) { return $db_selected; }
$db_selected = DatabaseConnect($MySQLUsername, $link);
return $db_selected;
}

//Add a Record to the Table
function SQLAddNewRecord(  /* Put field list in here */ )
{
global $MySQLServer, $MySQLUsername, $MySQLPassword, $Link;
SQLSetupLink();
SQLSetupDB();

	
	
}


//Find a Record and return the PKID


//Mark the given Record (by PKID) as Deleted


//Get an individual Field for the given PKID












?>

