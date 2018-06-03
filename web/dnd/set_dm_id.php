<?php
session_start();

$_SESSION["dmname"] = $_POST['dmname'];

echo $_SESSION["dmname"];


?>