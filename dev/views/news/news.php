<?php 

include "../core/semi-header.php";
include "../../database/Snarc_Database.php";
include "../../database/NewsItemModel.php";

/**
 * This is the news item listing page
 *
*/
//array of item title: RefId, [Title, Author, Date, filename]
//$newsItemTitles = [
//    '0' =>
//        ["This is the news Item Title1","G1GB0","01/01/1971","news1",],
//    '1' =>
//        ["This is the news Item Title2","G2GB0","01/01/1972","news2",],
//    '2' =>
//        ["This is the news Item Title3","G3GB0","01/01/1973","news3",],
//    '3' =>
//        ["This is the news Item Title4","G4GB0","01/01/1974","news4",],
//    '4'=>
//        ["This is the news Item Title5","G5GB0","01/01/1975","news5",],
//    ];

$newsItemModel = new NewsItemModel();
if( $newsItemModel->getConnectionStatus()) {
    $newsArray = $newsItemModel->getNewsItems();
    include "newsPartial.php";
}else{
    include "newsFailure.php";
}


?>

<?php include "../core/footer.php"; ?>
