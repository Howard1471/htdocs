<!-- Program: mysql_send.php
Desc: PHP program that sends an SQL query to the
MySQL server and displays the results.
-->
<html>
<head><title>SQLTest 1</title></head>
<body>
<?php

$host='mysql12.freehostia.com';
$user='howkee_testdb1';
$password='Pr10r1ty';
$database="";

/* Section that executes query on page refresh*/
if(@$_GET['form'] == "yes")
{
	// Open a Connection
	$link = mysql_connect($host,$user,$password);
	if ($link)
	{
		echo 'connected successfully';
	}
	
	if ( $database != "" ) //If there is a currently specified database then select it
	{
		mysql_select_db($database, $link);
	}

$result = mysql_query($query); // send the query message, return the result

//Display the basic details
echo "Database Selected: <b>{$database}</b><br>Query: <b>$query</b><h3>Results</h3><hr>";

if($result == 0) // Query failed - report the error number

	{
	echo "<b>Error ".mysql_errno().": ".mysql_error()."</b>";
	}
elseif (@mysql_num_rows($result) == 0) // Query successful but nothing returned
	{
	echo("<b>Query completed. No results returned.</b><br>");
	}
	else // Query Successful, at least one line has been returned so display it
	{
	echo "<table border='1'><thead><tr>";
	for($i = 0;$i < mysql_num_fields($result);$i++) // Display fields
		{
		echo "<th>".mysql_field_name($result,$i)."</th>";
		}
	echo " </tr></thead><tbody>";
	
	for ($i = 0; $i < mysql_num_rows($result); $i++) // Display rows
		{
		echo "<tr>";
		$row = mysql_fetch_row($result);
		for($j = 0;$j<mysql_num_fields($result);$j++)
			{
			echo("<td>" . $row[$j] . "</td>");
			}
		echo "</tr>";
		}
	echo "</tbody></table>";
	} //end else
	
echo "<hr><br><form action=\"{$_SERVER['PHP_SELF']}\" method=\"POST\">
			<input type='hidden' name='query' value='$query'>
			<input type='hidden' name='database'
			value={$_POST['database']}>
			<input type='submit' name=\"queryButton\"
			value=\"New Query\">
			<input type='submit' name=\"queryButton\"
			value=\"Edit Query\">
			</form>";
unset($form);
exit();
} // endif form=yes

/* Section that requests user input of query */
@$query=stripSlashes($_POST['query']);
if (@$_POST['queryButton'] != "Edit Query")
	{
	$query = " ";
	}
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?form=yes"
method="POST">
<table>
<tr>
<td align=right><b>Type in database name</b></td>
<td><input type="text" name="database"
value=<?php echo $database; ?> ></td>
</tr>
<tr>
<td align="right" valign="top">
<b>Type in SQL query</b></td>
<td><textarea name="query" cols="60"
rows="10"><?php echo $query ?></textarea>
</td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit"
value="Submit Query"></td>
</tr>
</table>
</form>
</body></html>

<?
//DatabaseConnect('howkee_testdb1', $link);
//RunMyQuery("INSERT INTO Test VALUES ('3','Fred','Bassett', 'Password01');" , $link);


mysql_close($link);

function Show_Databases( $link) //This function returns access denied
{
	
	echo 'Show_Databases : '. $link . '<br>';
	$db_list = mysql_list_dbs($link);

	while ($row = mysql_fetch_object($db_list)) 
	{
     echo $row->Database . "\n";
	}
}

function DatabaseConnect($dbasename, $link)
{
	echo '<br>Database Connect : ' . $dbasename. ' - ' .$link . '<br>';
	$db_selected = mysql_select_db($dbasename, $link);
		if (!$db_selected) {
		Reportfailure(0);	
    	die ();
		}
	

}
function TableConnect($link)
{
	echo '<br>Table Connect : '. $link . '<br>';
		
$result = mysql_query("SHOW COLUMNS FROM Test");
if (!$result) {
    Reportfailure(0);
    die();
	}
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {
        echo '<br>' .$row . '<br>'; }
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

function Reportfailure($result)
{
// report any failure messages 

echo "<b>Error ".mysql_errno().": ".mysql_error()."</b>";

}


/*  MySQL Staements
INSERT INTO REL_countries VALUES ('C', 'Canada');
*/
?>	
	