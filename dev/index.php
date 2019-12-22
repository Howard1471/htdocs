<?php

echo "Silence is Golden";
session_start();
$_SESSION['user'] = "user";
header("Location:views/main/start.php");
