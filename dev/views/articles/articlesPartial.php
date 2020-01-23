<div class="row">

    <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3"></div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 viewpanel">

        <div class="row">
            <div class="col-xs-1 col-sm-1 col-md-3 col-lg-3 "></div>
            <div class="col-xs-10 col-sm-10 col-md-6 col-lg-6 ">
                <h1>Articles</h1>

                <?php
                foreach( $articlesArray as $articlesItem=>$articlesValue ){
                    echo "<div class='row' >";
                    echo "<div class= 'col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left'>";
                    echo "<a class='newsAnchor' href='articlesDetail.php?articlesref=".$articlesValue['article_id']."' >".$articlesValue['articletitle']."</a>";
                    echo "</div></div>";

                    echo "<div class='row' >";
                    echo "<div class= 'col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left'>";
                    echo "<p>Author: ".$articlesValue['articleauthor']."</p>";
                    echo "</div>";

                    echo "<div class= 'col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right'>";
                    echo "<p>Published: ".substr($articlesValue['articledate'],0,10)."</p>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-3 col-lg-3 "></div>
        </div>


    </div>
    <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3"></div>
</div>
<div class = "row"><div class = "col-md-12 col-lg-12 spacer20"></div></div>
