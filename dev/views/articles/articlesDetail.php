<?php

include "../core/semi-header.php";
include "../../database/Snarc_Database.php";
include "../../database/ArticlesModel.php";

if( !isset($_GET['articlesref'])){
    //console_log("articlesref Not set");
    header("Location:articles.php");
} else {
    $articlesRef = $_GET['articlesref'];
}
$articlesItem = new ArticlesModel();
$articlesArray = $articlesItem->getNewsItem($articlesRef);

?>
<div class="row">

    <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3"></div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 viewpanel">

        <div class="row">
        <div class="col-xs-1 col-sm-1 col-md-3 col-lg-3 "></div>
        <div class="col-xs-10 col-sm-10 col-md-6 col-lg-6 ">
            <h1>News</h1>

        <?php
        foreach($articlesArray as $articlesArrayItem=>$articlesArrayValue) {

            echo "<div class='row' >";
            echo "<div class= 'col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left'>";
            echo "<h2>" . $articlesArrayValue['articlestitle'] . "</h2>";
            echo "</div></div>";

            echo "<div class='row' >";
                echo "<div class= 'col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left'>";
                echo "<p>Author: " . $articlesArrayValue['articlesauthor'] . "</p>";
                echo "</div>";

                echo "<div class= 'col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right'>";
                echo "<p>Published: " . substr($articlesArrayValue['articlesdate'], 0, 10) . "</p>";
                echo "</div>";
            echo "</div>";

            echo "<div class='row' >";
                echo "<div class= 'col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left'>";
                echo "<p>" . $articlesArrayValue['articlestext'] . "</p>";
                echo "</div>";
            echo "</div>";
        }
        ?>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-3 col-lg-3 "></div>
        </div>


    </div>
    <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3"></div>
</div>
<div class = "row"><div class = "col-md-12 col-lg-12 spacer20"></div></div>
<?php
include "../core/footer.php";

function console_log($data) {
$output = $data;
if (is_array($output))
$output = implode(',', $output);
$msg = 'console.log(' . json_encode($output, JSON_HEX_TAG).');';

echo $msg;
}