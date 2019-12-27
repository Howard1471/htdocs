<!doctype html>
<html lang="en">
<head>

<?php
include "../../core/Constants.php";
if (!isset($_SESSION['user'])) {
    header("Location:".ROOT_INDEX);
}
$menuType = $_SESSION['menutype'];

include "meta.php";
include "Menuing.php";

$menu = new Menuing();


?>

</head>
<body>

<div class="container-fluid">

        <div class="row">
            <div class="col-md-12 col-lg-12 posRel">
                <img class="headerImage" src="../images/Website_Header_1000x313.jpg"/>
                <div class="post-content">
                    <h1>South Notts Amateur Radio Club</h1>
                    <h3>Affiliated to The Radio Society of Great Britain</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-lg-3 bg_black"></div>
            <div class="col-md-6 col-lg-6 bg_black">
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

                        //include "../core/menuService.php";
                        ?>

                </div>
            </div>
            <div class="col-md-3 col-lg-3 bg_black"></div>

    </div>
