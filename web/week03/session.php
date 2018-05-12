<?php
// start the session! ONly need it once per page you want to access variables from.
session_start();

$itemName = $_POST["itemName"];
$price = $_POST["price"];
$_SESSION[$itemName] = $price;
foreach($_SESSION as $key => $value){
    echo "name is: $key, value is $value";

}
?>


