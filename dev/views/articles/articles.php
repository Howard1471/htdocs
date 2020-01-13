<?php 
include "../core/semi-header.php";
include "../../database/Snarc_Database.php";
include "../../database/ArticlesModel.php";
/**
 * This is the articles listing page
*/
?>
<?php
    $articlesModel = new ArticlesModel();
    if( $articlesModel->getConnectionStatus()) {
    $articlesArray = $articlesModel->getAllArticles();
    include "articlesPartial.php";
    }else{
    include "articlesFailure.php";
    }

include "../core/footer.php"; ?>