<?php
session_start();
$itemName = $_POST["itemName"];
$_SESSION["name"] = $_POST["data"];
echo $_SESSION["name"];
// echo "alert(\"THe item is: "."$itemName"."\");";
?>


