<!doctype html>
<html lang="en">
<head>

<?php
include "../../assets/Constants.php";

if (!isset($_SESSION['user'])) {
    header("Location:".ROOT_INDEX);
}
$menuType = $_SESSION['menutype'];

include "meta.php";
include "Menuing.php";

$menu = new Menuing();
?>

</head>
<body >
<div class="row footerboxes">

<?php
if( $menuType == 'long'){
    echo "<div class = 'col-md-2 col-lg-2'><img src='";
    echo LOGO;
    echo "' class='imagecenter' ></div>";

}
?>

<!--            <div class = "col-xs-0 col-sm-0 col-md-0 col-lg-2 ">-->
<!--                <img src="--><?php //echo LOGO; ?><!--">-->
<!--            </div>-->
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" >
                <div class = "row">
                <div class = "col-md-12 col-lg-12 spacer20"></div></div>
                <h3>South Notts Amateur Radio Club</h3>
                <h1>Affiliated to The Radio Society of Great Britain</h1>
            </div>
            <div class = "col-md-2 col-lg-2">
                <img src="<?php echo LOGO; ?>" class="imagecenter">
            </div>
        </div>

        <div class="row"> <!-- Menu bar -->
            <div class="col-sm-0 col-md-0 col-lg-3 bg_black"></div>
            <div class="col-sm-12 col-md-12 col-lg-6 bg_black">
                <div class="menubar">
                <?php

                if( $menuType == 'long'){
                    $menuContent = $menu->getMainMenu();
                    $menuURLs = $menu->getMainURLs();
                } else {
                    $menuContent = $menu->getShortMenu();
                    $menuURLs = $menu->getShortURLs();
                }
                $menuEntries = count($menuContent);
                echo"<ul>";
                for( $i = 0; $i < $menuEntries ; $i++ ){
                    echo "<li><a href='".ROOT."/".$menuURLs[$i]."'>".$menuContent[$i]."</a></li>";
                }
                echo"</ul>";
                ?>
                </div>
            </div>
            <div class="col-sm-0 col-md-0 col-lg-3 bg_black"></div>
        </div>


    <div class="container-fluid" >




    
            
   
