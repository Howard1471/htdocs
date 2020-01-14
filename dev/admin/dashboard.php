

<?php
include "admin-header.php";

//if( isset($_GET['admin'])){
//    $username = $_GET['admin'];
//    }else{
//    header("Location:".ROOT_INDEX);
//}

?>

<div class="row">
    <div class="col-md-4 col-lg-4 dashpanel">

    </div>
    <div class="col-md-4 col-lg-4 dashpanel">
        <?php include "createarticleitem.php"; ?>
    </div>
    <div class="col-md-4 col-lg-4 dashpanel">
        <?php include "createnewsitem.php"; ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-lg-4 dashpanel"></div>
    <div class="col-md-4 col-lg-4 dashpanel"></div>
    <div class="col-md-4 col-lg-4 dashpanel"></div>
</div>

<?php

include "admin-footer.php";





