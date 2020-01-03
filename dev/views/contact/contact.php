<?php 
include "../core/semi-header.php";

/**
 * This is the 
*/
?>

<div class = "row"><div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 spacer20"></div></div>
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 contactform">
        <h1>Contact Form</h1>
        <p>Please use this form to contact the club with any enquiries. We will endeavour to return to you as soon as we are able.</p>
        <p>The Secretary</p>
    </div>
 
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
        <?php
        include "contactForm.php";
        ?>
    </div>

    <div class="col-xs-0 col-sm-0 col-md-0 col-lg-0"></div>

</div>
<div class = "row"><div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 spacer20"></div></div>

<script src= <?php echo ROOT."/assets/js/contactform.js";?> ></script>
<?php include "../core/footer.php"; ?>