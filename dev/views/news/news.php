<?php 

include "../core/semi-header.php";

/**
 * This is the news item listing page
 *
*/
//array of item title: RefId, [Title, Author, Date, filename]
$newsItemTitles = [
    '0' =>
        ["This is the news Item Title1","G1GB0","01/01/1971","news1",],
    '1' =>
        ["This is the news Item Title2","G2GB0","01/01/1972","news2",],
    '2' =>
        ["This is the news Item Title3","G3GB0","01/01/1973","news3",],
    '3' =>
        ["This is the news Item Title4","G4GB0","01/01/1974","news4",],
    '4'=>
        ["This is the news Item Title5","G5GB0","01/01/1975","news5",],
    ];

?>

<div class="row">

    <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3"></div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 viewpanel">

        <div class="row">
        <div class="col-xs-1 col-sm-1 col-md-3 col-lg-3 "></div>
        <div class="col-xs-10 col-sm-10 col-md-6 col-lg-6 ">
            <h1>News</h1>

        <?php
        foreach( $newsItemTitles as $newsItemTitle=>$newsItemValue ){
            echo "<div class='row' >";
                echo "<div class= 'col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left'>";
                echo "<a class='newsAnchor' href='newstemplate.php?value=".$newsItemTitle."'>".$newsItemValue[0]."</a>";
                echo "</div></div>";

            echo "<div class='row' >";
                echo "<div class= 'col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left'>";
                echo "<p>Author: ".$newsItemValue[1]."</p>";
                echo "</div>";

                echo "<div class= 'col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right'>";
                echo "<p>Published: ".$newsItemValue[2]."</p>";
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
<?php include "../core/footer.php"; ?>
