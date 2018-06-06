<?php
session_start();

$_SESSION["gamename"] = $_POST['gamename'];

echo $_SESSION["gamename"];

?>