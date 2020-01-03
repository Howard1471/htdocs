<?php

session_start();
$_SESSION['user'] = "user";

$screenWidth = htmlspecialchars($_GET["screenW"]);

if($screenWidth < 768 ){
    $_SESSION['menutype'] = 'short';
} else {
    $_SESSION['menutype'] = 'long';
}

header("Location:../main/start.php");
