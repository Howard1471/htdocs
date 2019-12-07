<!-- Program: mysql_send.php
Desc: PHP program that sends an SQL query to the
MySQL server and displays the results.
-->
<html>
<head><title>SQL Query Sender</title></head>
<body>
<?php

$host="mysql12.freehostia.com";
$user="howkee_testdb1";
$password="Pr10r1ty";
$database="howkee_testdb1";
$query = "SHOW DATABASES"; // Basic command for testing - should return 1 database name


/* Section that executes query on page refresh*/
if(@$_GET['form'] == "yes")
{
	// Open a Connection
	mysql_connect($host,$user,$password);
	
	if ( $database != "" ) //If there is a currently specified database then select it
	{
		mysql_select_db($database);
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