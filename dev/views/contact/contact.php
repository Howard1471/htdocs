<?php 
include "../../core/Constants.php";
include "../core/semi-header.php";

/**
 * This is the 
*/
?>

<div class = "row"><div class = "col-md-12 col-lg-12 spacer20"></div></div>
<div class="row">

    <div class="col-md-2 col-lg-2"></div>
    <div class="col-md-5 col-lg-5">
        <h1>Contact Form</h1>

        <div class="col-md-12 contactform">
            <form id="contactForm" >
            <div class = "row"><div class = "col-md-12 col-lg-12 spacer20"></div></div>
                <div class="row">
                    <div class="col-md-2 col-lg-2"><p>Name</p></div>
                    <div class="col-md-10 col-lg-10"><input type="text" size= "45" id="contactName"></div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-lg-2"><p>Email</p></div>
                    <div class="col-md-10 col-lg-10"><input type="text" size= "25" id="contactEmail"></div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-lg-2"><p>Subject</p></div>
                    <div class="col-md-10 col-lg-10"><input type="text" size= "25" id="contactSubject"></div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-lg-2"><p>Message</p></div>
                    <div class="col-md-10 col-lg-10"><textarea rows="5" cols="50" id="contactMessage">Enter your enquiry here</textarea></div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-5 col-lg-5">
    <p>Please use this form to contact the club with any enquiries. We will endeavour to return to you as soon as we are able.</p>
    </div>

</div>
<div class = "row"><div class = "col-md-12 col-lg-12 spacer20"></div></div>
<?php include "../core/footer.php"; ?>