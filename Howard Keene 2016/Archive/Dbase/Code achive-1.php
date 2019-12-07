<?php
//Archive storage for its of code

function SetRecordValue( $link, $Tablename, $FieldName, $Value, $PKID, $Key)
{
	//Set the field value in the given record to the given value
	$QueryStr = 'REPLACE INTO ' . $Tablename . ' ( ' . $PKID . ',' .$FieldName . ') VALUES (' .$Key. ',"' .$Value. '" )';
	echo '<br> QueryStr = ' . $QueryStr . '<br>'; 
	$result = mysql_query( $QueryStr, $link);
return $result;
}
function CreateTestTable($link)
{
	$query = "CREATE TABLE `Test` (
`PKID` INT( 3 ) UNSIGNED NOT NULL ,
`Firstname` TEXT NOT NULL ,
`Secondname` TEXT NOT NULL ,
`Password` TEXT NOT NULL ,
PRIMARY KEY ( `PKID` ) ) TYPE = MYISAM ;";

echo 'CreateTestTable : '. $link . '<br>';
echo '<br.Query: ' .$query. '<br>';
 if (mysql_query( $query, $link ) == 0)
 	{ Reportfailure(0); }

}

