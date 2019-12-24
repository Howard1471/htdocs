<?php 
include "../core/semi-header.php";

/**
 * This is the 
*/
?>

<div class = "row"><div class = "col-md-12 col-lg-12 spacer20"></div></div>
<div class="row">

    <div class="col-md-2 col-lg-2">
        <h1>Contact Form</h1>
        <p>Please use this form to contact the club with any enquiries. We will endeavour to return to you as soon as we are able.</p>
        <p>Secretary</p>
    </div>
    <div class="col-md-8 col-lg-8">

        <form id="contactForm" >
            <div class="row">
                <div class="col-md-8 contactform">
                    <div class = "row"><div class = "col-md-12 col-lg-12 spacer20"></div></div>
                    <div class="row">
                        <div class="col-md-2 col-lg-2"><p>Name</p></div>
                        <div class="col-md-10 col-lg-10"><input type="text" size= "45" id="contactName" placeholder="first name and/or callsign here"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-lg-2"><p>Email</p></div>
                        <div class="col-md-10 col-lg-10"><input type="text" size= "50" id="contactEmail" placeholder="your contact email address here"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-lg-2"><p>Subject</p></div>
                        <div class="col-md-10 col-lg-10"><input type="text" size= "50" id="contactSubject" placeholder="The subject of your enquiry here"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-lg-2"><p>Message</p></div>
                        <div class="col-md-10 col-lg-10"><textarea rows="5" cols="80" id="contactMessage" placeholder="Enter your enquiry here"></textarea></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 text-center">

                        </div>
                        <div class="col-md-6 col-lg-6 text-center">
                            <input type="button" id="sendBtn" value="Send" class="btn-send-email"/>
                        </div>
                    </div>


                </div>
                <div class="col-md-4"></div>
            </div>
        </form>

    </div>
    <div class="col-md-2 col-lg-2">
</div>
</div>
<div class = "row"><div class = "col-md-12 col-lg-12 spacer20"></div></div>


<?php include "../core/footer.php"; ?>