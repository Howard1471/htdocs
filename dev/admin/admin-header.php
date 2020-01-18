<!doctype html>
<html lang="en">
<head>

    <?php
    include_once "../assets/Constants.php";

    //If no user type has been set then return to the home page
    if (!isset($_SESSION['user'])) {
        header("Location:".ROOT_INDEX);
    }

    //Check screen is desktop or laptop only
    $menuType = $_SESSION['menutype'];
    if( $menuType != 'long'){
        header("Location:".ROOT_INDEX);
    }

    $_SESSION['user'] = "admin";
    $_SESSION['menutype'] = "long";

    include "../includes/meta.php";
    include "../includes/Menuing.php";

    $menu = new Menuing();
    ?>


</head>
<body >
       <div class="row footerboxes">
            <div class = "col-md-2 col-lg-2">
                <img src="<?php echo LOGO; ?>" class = "admincentre">
            </div>
            <div class="col-md-8 col-lg-8 admincentre">
                <div class = "col-md-12 col-lg-12 spacer20"></div>
                <h3 class = "adminHeader3">Admin Dashboard</h3>

            </div>
            <div class = "col-md-2 col-lg-2 ">
                <img src="<?php echo LOGO; ?>"  class = "admincentre">
            </div>
        </div>

        <div class="row"> <!-- Menu bar -->
            <div class="col-sm-0 col-md-0 col-lg-3 bg_black"></div>
            <div class="col-sm-12 col-md-12 col-lg-6 bg_black">
                <div class="menubar">
                <?php

                $menuContent = $menu->getAdminMenuArray();
                $menuURLs = $menu->getAdminURLs();
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