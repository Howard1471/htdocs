.<?php

global $MySQLServer, $MySQLUsername, $MySQLPassword;

$MySQLServer = 'mysql22.freehostia.com';
$MySQLUsername = 'howkee_f1data';
$MySQLPassword = 'H0wk33'; 
$Tablename = 'Userlogin';

echo '<br>SQLFunctions.php testing<br>';

$link = mysql_connect($MySQLServer, $MySQLUsername, $MySQLPassword);

if (!$link) {
   die('Could not connect MySQL : ' . mysql_error());
	}
echo 'MySQL Connected successfully : ' .$link .'<br>';


$db_selected = DatabaseConnect($MySQLUsername, $link);
if (!$db_selected) {
		Reportfailure(0);	
    	die ();
		}

TableRowList($link, $Tablename);
//$queryStr = 'SELECT FROM ' . $Tablename . 'WHERE PKID = 5';
SetRecordValue( $link, $Tablename, "", "", "PKID", 6 );
$result = SelectAllTable($link, $Tablename);
DisplayTableRows($result);


mysql_close($link);



/*******************************************************************************/
//Connect to the required Database on the $Link cserver connection
function DatabaseConnect($dbasename, $link)
{
	echo '<br>Database Connect : ' . $dbasename. ' - ' .$link . '<br>';
	$db_selected = mysql_select_db($dbasename, $link);
return $db_selected;
}

function RecordCount( $link, $Tablename)
{
	//Run a query on all records for the given table
	$QueryStr = "SELECT * FROM " . $Tablename ;
	$result = mysql_query( $QueryStr, $link);
	$Row_Count = mysql_num_rows($result);
return $Row_Count;
}

function FieldCount( $link, $Tablename )
{
	//Run a query on all records for the given table
	$QueryStr = "SELECT * FROM " . $Tablename ;
	$result = mysql_query( $QueryStr, $link);
	$Field_Count = mysql_num_fields($result);	
return $Field_Count;
}

function GetFieldName( $link, $Tablename, $FieldNumber )
{
	
	//$Field_Count = FieldCount( $link, $Tablename );
	$QueryStr = "SELECT * FROM " . $Tablename ;
	$result = mysql_query( $QueryStr, $link);
	$Field_Name = mysql_field_name($result ,$FieldNumber);
return $Field_Name;
}

Function GetSpecifiedRecord( $link, $Tablename, $Fieldname, $value )
{
	//Get the record matching the criteria Filedname/value and return the result
	//Format :- $QueryStr = 'SELECT * FROM ' . $Tablename . ' WHERE PKID = 6';
	$QueryStr = 'SELECT * FROM ' . $Tablename . ' WHERE ' . $Fieldname . ' = ' . $value ;
	$result = mysql_query( $QueryStr, $link);
return $result;
}

function SetRecordValue( $link, $Tablename, $FieldName, $Value, $PKID, $Key)
{
//Set the Record values in the given record,
//Changing only that which i specified by tevribl$Fiedame
echo '<br>SetRecordValue Function<br>';
//request the table
	$QueryStr = 'SELECT * FROM '.$Tablename.' WHERE '.$PKID.' = '.$Key;
	$result = mysql_query( $QueryStr, $link);
	
$FieldCount = mysql_num_fields($result);
$RowCount = mysql_num_rows($result);
echo '<br>For Query :'.$QueryStr;
echo '<br>There are ' .$FieldCount. ' fields in the table';
echo '<br>There are '.$RowCount.' records returned<br>';

//$QueryStr = 'REPLACE INTO ' . $Tablename . ' ( ' . $PKID . ',' .$FieldName . ') VALUES (' .$Key. ',"' .$Value. '" )';

}
/********************************************************************************/
function TableRowList($link, $Tablename)
{
// Query the database for all records and display them if successful	
echo '<br>Table Connect : '. $link . '<br>';
		
$result = mysql_query("SELECT * FROM ".$tablename." ", $link);
if ($result == 0) {
    Reportfailure(0);
    die();
	}
	else
	{
	DisplayTableRows($result);
	}

}
function RunMyQuery( $query, $link )
{
	echo '<br>Running query : ' . $query . '<br>';
	$result = mysql_query( $query, $link );
	if ( $result == 0 ) {
		Reportfailure(0);
	}
}
function Reportfailure($result)
{
// report any failure messages 

echo "<b>Error ".mysql_errno().": ".mysql_error()."</b>";

}

Function InsertRow( $link, $Tablename, $Values )
{
//$Values should be a string in the format of " 'Var1','Var2', .... ,'VarN' "
//Can be donwith the \" escape sequence
		$querystr = "INSERT INTO " . $Tablename ." VALUES ( " . $Values . ");";
		RunMyQuery( $querystr , $link);
}

function DisplayTableRows($result) // Displays the Rows and columns in a Table
{

$FieldCount = mysql_num_fields($result);
$RowCount = mysql_num_rows($result);

echo '<br>Field Count : '.$FieldCount.'<br>Rowcount : '.$RowCount.'<br>';
if ( $RowCount == 0 )
	{ 
	echo '<br>No rows returned: <br>';
	return; 
	}
	
	echo "<table border='1'><tr>";
	for($i = 0; $i < mysql_num_fields($result) ; $i++ ) // Display fields
		{
		echo "<td>".mysql_field_name($result,$i)."</td>";
		}
	echo "</tr>";
	for ( $i = 0; $i < mysql_num_rows($result) ; $i++ ) // Display rows
		{
		echo "<tr>";
		$row = mysql_fetch_row($result);
		for( $j = 0; $j < mysql_num_fields($result); $j++ )
			{
			echo("<td>" . $row[$j] . "</td>");
			}
		echo "</tr>";
		}
	echo "</table>";
}

function SelectAllTable($link, $Tablename)
{
	$QueryStr = 'SELECT * FROM '.$Tablename;
	$result = mysql_query( $QueryStr, $link );
return $result;
}



/*  MySQL Staements
INSERT INTO REL_countries VALUES ('C', 'Canada');
*/
?>


