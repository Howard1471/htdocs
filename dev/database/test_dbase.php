<!doctype html>
<html lang="en">
<head>
    <body>
<?php
include "Snarc_Database.php";
include "NewsItemModel.php";

?>
<h1>Database test page</h1>

<?php
global $testDB;
//new instance of the connection
$testDB = new NewsItemModel();

if( $testDB->getConnectionStatus()){
    echo "<p>Model Connection successful</p>";
} else {
    echo "<p>Model Connection failed</p>";
}
$mysqlDate = getTheDate();
echo "<p>MySQL date: ".$mysqlDate."</p>";
$myTextDate = convertMysqlDateToUK( $mysqlDate );
echo "<p>Text date: ".$myTextDate."</p>";
$myNewDate = convertUkDateToMySQL($myTextDate);
echo "<p>New SQL date: ".$myNewDate."</p>";


//$newsArray = getNewsItems();
//listNewsItems( $newsArray );

//$newsItem: [title, author, date, text] - YYYY-MM-DD HH:MI:SS.
function insertNewsItem()
{
    global $testDB;
$testArray = [
    'title' => 'This is the third news Items',
    'author' => 'G3GBO',
    'date' => '2020-01-04 12:00:15',
    'text' => 'This is the third item of news to be published',
    ];

if( $testDB->insertNewsItem( $testArray ) ){
    echo "<p>Insert News Item Successful</p>";
} else {
    echo "<p>Insert News Item failed</p>";
}
}

function getNewsItems()
{
    global $testDB;

    $testArray = [];
    $testArray = $testDB->getNewsItems();
    if( $testArray != null){
        echo "<p>Number of records fetched : ".count($testArray)."</p>";
        return $testArray;
    } else {
        return null;
    }
}

function listNewsItems( $newsArray)
{
    foreach($newsArray as $newsItem=>$newsValue){
        echo "<p>Title : ".$newsValue['newstitle']."</p>";
        echo "<p>Author: ".$newsValue['newsauthor']."</p>";
        echo "<p>Date  : ".$newsValue['newsdate']."</p>";
        echo "<p>Text  : ".$newsValue['newstext']."</p>";
    }
}

//timezone 'Europe/London'
function getTheDate()
{
   date_default_timezone_set('Europe/London');
   return date("Y-m-d H:i:s");
}
function convertMysqlDateToUK( $mysqlDate )
{
    $dateStr = substr($mysqlDate,0,10);
    $dateStr2 = explode("-",$dateStr,3);
    return $dateStr2[2]."/".$dateStr2[1]."/".$dateStr2[0];
}
function convertUkDateToMySQL($myTextDate)
{
    $dateStr  = explode("/",$myTextDate,3);
    return $dateStr[2]."-".$dateStr[1]."-".$dateStr[0]." 00:00:00";
}

?>
</body>
</html>
