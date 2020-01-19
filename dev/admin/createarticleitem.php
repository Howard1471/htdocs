<?php
include "admin-header.php";

//if( isset($_GET['admin'])){
//    $username = $_GET['admin'];
//    }else{
//    header("Location:".ROOT_INDEX);
//}

?>
<!--<div class = "row"><div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 spacer20"></div></div>-->
<div class="row">
    <div class="col-xs-0 col-sm-0 col-md-4 col-lg-4"></div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 dashpanel createnewspanel">
        <div class = "row"><div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 spacer20"></div></div>

        <form id="articleForm" method="post" enctype="multipart/form-data" action="vm/insertArticleItem.php">
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
                    <input type="text" id="articleDate" >
                </div>
            </div>

            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 newsRight">
                    <p>File</p>
                </div>
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 newsLeft">
                    <input type="file" id = "articleFile" name="file_upload" value = "browse"
                           style="border: solid 1px #000000;" class = "width100"
                            accept="application/pdf"/>
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
                    <input type="checkbox" id = "emailArticleCheckbox" checked>PDF Document<br>
                    <input type="checkbox" id = "memberArticleCheckbox">Members Only<br>
                    <input type="hidden" id = "enabled" value = true>

                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                    <input type="submit" name="articleInsertButton" value="Upload" class = "btn-send-email"/>
                </div>
            </div>
        </form>

    </div>
    <div class="col-xs-0 col-sm-0 col-md-4 col-lg-4"></div>
</div>
    <div class = "row"><div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 spacer20"></div></div>
<?php
include "footer-panel.php";
include "admin-footer.php";
