<?php
include "admin-header.php";
?>
    <div class="row">
        <div class="col-xs-0 col-sm-0 col-md-4 col-lg-4 ">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 dashpanel createnewspanel">
            <div class = "row"><div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 spacer20"></div></div>
            <p>The document did not upload correctly, check the following:</p>

            <?php
            $code = $_GET['code'];

            switch ( $code) {

                case 1:
                    echo "<p>File already exists</p>";
                    break;
                case 2:
                    echo "<p>File size too large</p>";
                    break;
                case 3:
                    echo "<p>Incorrect file type</p>";
                    break;
                case 4:
                    echo "<p>File Upload failed for unspecified reason</p>";
                default:
                    echo "<p>".$code."</p>";
            }

            ?>
        </div>
        <div class="col-xs-0 col-sm-0 col-md-4 col-lg-4 ">
        </div>
    </div>
<?php

include "footer-panel.php";
include "admin-footer.php";