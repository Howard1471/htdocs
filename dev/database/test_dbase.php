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
$newsArray = getNewsItems();
listNewsItems( $newsArray );

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


?>
</body>
</html>
