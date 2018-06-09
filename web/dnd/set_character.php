<?php
session_start();

$_SESSION["character"] = $_POST['character'];

echo $_SESSION["character"];

?>