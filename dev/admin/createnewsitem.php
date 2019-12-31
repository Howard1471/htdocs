<?php

?>
<div class="row">
    <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 createnewspanel">

        <form id="newsForm" method="post">
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                    <p>Title :</p>
                </div>
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 newsLeft">
                   <input type="text" id="newsTitle" size="50" placeholder="News Item Title" autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                    <p>Author :</p>
                </div>
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 newsLeft">
                    <input type="text" id="newsAuthor" size="25" placeholder="Author's name/callsign" autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                    <p>Date :</p>
                </div>
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 newsLeft">
                    <input type="text" id="newsDate" size="50" placeholder="publishing date" autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                    <p>text :</p>
                </div>
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 newsLeft">
                    <textarea id="newsText" cols="60" rows="5" placeholder="news text"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                    <input type="checkbox" id = "emailCheckbox">Email Notification<br>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                    <input type="button" id="newsItemInsertButton" value="Insert" class = "btn-send-email"/>
                </div>

            </div>
        </form>
    </div>
<!--    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 boxystuff"></div>-->
</div>