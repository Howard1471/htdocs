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
$articlesArray = $articlesItem->getArticleItem($articlesRef);
$filename = $articlesArray[0]['articlefile'];
?>
<div class="row">

    <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3"></div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
        <embed src="../../documents/<?php echo $filename; ?>" type="application/pdf"   height="900px" width="100%">
    </div>
    <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3"></div>
</div>

<div class = "row"><div class = "col-md-12 col-lg-12 spacer20"></div></div>
<?php
include "../core/footer.php";

