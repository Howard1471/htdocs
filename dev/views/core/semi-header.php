<!doctype html>
<html lang="en">
<head>

<?php
include "../../core/Constants.php";
include "meta.php";
include "Menuing.php";

$menu = new Menuing();
?>

</head>
<body>

<div class="container-fluid">
    <div class="row footerboxes">
        <div class = "col-md-2 col-lg-2 align-content-center">
            <img src="<?php echo LOGO; ?>">
        </div>
        <div class="col-md-8 col-lg-8 align-content-center" >
            <div class = "row">
            <div class = "col-md-12 col-lg-12 spacer20"></div></div>
            <h3>South Notts Amateur Radio Club</h3>
            <h1>Affiliated to The Radio Society of Great Britain</h1>
        </div>
        <div class = "col-md-2 col-lg-2 align-content-center">
            <img src="<?php echo LOGO; ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-lg-3 bg_black"></div>
        <div class="col-md-6 col-lg-6 bg_black">
            <div class="menubar">
            <?php

            if( $_SESSION['user'] == 'user'){
                $menuContent = $menu->getMainMenu();
                $menuURLs = $menu->getMainURLs();
            } else {
                $menuContent = $menu->getAdminMenuArray();
                $menuURLs = $menu->getAdminURLs();
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



    
            
   
