<?php
session_start();
// $characterArray = [];

$_SESSION["character"] = $_POST['character'];


// array_push($characterArray, $_POST['character']);

echo $_SESSION["character"];

?>