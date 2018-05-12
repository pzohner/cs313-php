<?php
session_start();
$itemName = $_POST["itemName"];
$price = $_POST["price"];
$_SESSION[$itemName] = $price;
echo $_SESSION[$itemName];
// echo "alert(\"THe item is: "."$itemName"."\");";
?>s


