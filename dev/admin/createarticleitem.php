
<div class="row">
    <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 createnewspanel">

        <form id="articleForm" method="post">
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 newsRight">
                    <p>Title</p>
                </div>
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 newsLeft ">
                    <input class="fullwidth" type="text" id="articleTitle" size="50" placeholder="Article Title" autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 newsRight">
                    <p>Author</p>
                </div>
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 newsLeft">
                    <input type="text" id="articleAuthor" size="25" placeholder="Author's name/callsign" autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 newsRight">
                    <p>Date</p>
                </div>
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 newsLeft">
                    <input type="text" id="articleDate" autocomplete="off">
                </div>
            </div>

            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 newsRight">
                    <p>File</p>
                </div>
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 newsLeft">
                    <input type="file" id = "articleFile" name="file_upload" value = "browse" style="border: solid 1px #000000;" class = "width100"/>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 newsRight">
                </div>
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 newsLeft">

                </div>
            </div>
            <div class = "row"><div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 spacer20"></div></div>
            <div class = "row"><div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 spacer20"></div></div>
            <div class = "row"><div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 spacer20"></div></div>
            <div class = "row"><div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 spacer20"></div></div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                    <input type="checkbox" id = "emailArticleCheckbox">Email Notification<br>
                    <input type="checkbox" id = "memberArticleCheckbox">Members Only<br>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                    <input type="button" id="articleInsertButton" value="Upload" class = "btn-send-email"/>
                </div>

            </div>
        </form>
    </div>
    <!--    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 boxystuff"></div>-->
</div>
