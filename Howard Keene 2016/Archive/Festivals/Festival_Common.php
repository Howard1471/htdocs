<?php
//Common code to all Festivals pages
//due to the nature of some of the info, this needs to be MYSQL based

//MYSQL
global $MySQLServer, $MySQLUsername, $MySQLPassword;

$MySQLServer = 'mysql28.freehostia.com';
$MySQLUsername = 'howkee_test2db';
$MySQLPassword = 'Pr10r1ty'; 
$Tablename = 'Register';

echo '<br>SQLRegister.php testing<br>';

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
/*******************************************************************************/
//Connect to the required Database on the $Link cserver connection
function DatabaseConnect($dbasename, $link)
{
echo '<br>Database Connect : ' . $dbasename. ' - ' .$link . '<br>';
$db_selected = mysql_select_db($dbasename, $link);
return $db_selected;
}

/*
function Register_CreateDB( $DB_Name )
//This cannot be done on the fly
{
	$mysql = "CREATE DATABASE " . $DB_Name;
	if (mysqli_query($con,$sql))
  {
  echo "Database my_db created successfully";
  }
else
  {
  echo "Error creating database: " . mysqli_error($con);
  }
}
*/

function Register_CreateTable ( $link, $Tablename, $Schema )
{
//$Schema format = FirstName CHAR(30),LastName CHAR(30),Age INT
$sql="CREATE TABLE ".$Tablename."(".$Schema.")";
 
// Execute query
 if (mysql_query($sql, $link))
  {
  echo "Table created successfully";
  }
else
  {
  echo "Error creating table: " . mysql_error($link);
  }

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
function TableRowList($link , $Tablename)
{
// Query the database for all records and display them if successful	
echo '<br>Table Connect : '. $link . '<br>';
		
$result = mysql_query("SELECT * FROM ".$Tablename, $link);
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
//Can be done with the \" escape sequence
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
