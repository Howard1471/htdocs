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

//new instance of the connection
$testDB = new NewsItemModel();

if( $testDB->getConnectionStatus()){
    echo "<p>Model Connection successful</p>";
} else {
    echo "<p>Model Connection failed</p>";
}

//$newsItem: [title, author, date, text] - YYYY-MM-DD HH:MI:SS.
$testArray = [
    'title' => 'This is the third news Items',
    'author' => 'G3GBO',
    'date' => '2020-01-04 12:00:15',
    'text' => 'This is the third item of news to be published',
    ];

if( $testDB->insertNewsItem( $testArray ) ){
    echo "<p>Insert News Item Successful";
} else {
    echo "<p>Insert News Item failed";
}


?>
</body>
</html>
