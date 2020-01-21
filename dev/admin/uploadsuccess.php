<?php
include "admin-header.php";
?>
    <div class="row">
        <div class="col-xs-0 col-sm-0 col-md-4 col-lg-4 ">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 dashpanel createnewspanel">
            <div class = "row"><div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 spacer20"></div></div>
            <p>The document uploaded correctly:</p>

            <?php
            $filename = $_GET['filename'];
            echo $filename;

            ?>
        </div>
        <div class="col-xs-0 col-sm-0 col-md-4 col-lg-4 ">
        </div>
    </div>
<?php

include "footer-panel.php";
include "admin-footer.php";
