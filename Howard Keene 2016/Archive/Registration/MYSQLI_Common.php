<?php
/* php 5 MYSQLI database class
include ("MYSQLI_Common.php");
*/
class Database
{

private static $_hostname = 'mysql28.freehostia.com';
private static $_mysqlUser = 'howkee_Register';
private static $_mysqlPass = 'Pr10r1ty';
private static $_mysqlDb = 'Howkee_Register';

protected static $_connection = NULL;

public static function getConnection() 
{
if (!self::$_connection) 
	{
	self::$_connection = new mysqli(self::$_hostName, self::$_mysqlUser,
	self::$_mysqlPass, self::$_mysqlDb);
		if (self::$_connection->connect_error) {
		die('Connect Error: ' . self::$_connection->connect_error);
		}
	}
return self::$_connection;
}

Private function _construct(){}



}
?>

 

