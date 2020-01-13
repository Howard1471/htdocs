<?php 

include "../core/semi-header.php";
include "../../database/Snarc_Database.php";
include "../../database/NewsItemModel.php";

/**
 * This is the news item listing page
 *
*/
//array of item title: RefId, [title, author, date, text]

$newsItemModel = new NewsItemModel();
if( $newsItemModel->getConnectionStatus()) {
    $newsArray = $newsItemModel->getLimitedNewsItems();
    include "newsPartial.php";
}else{
    include "newsFailure.php";
}


?>

<?php include "../core/footer.php"; ?>
