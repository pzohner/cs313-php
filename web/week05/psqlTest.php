<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Team03</title>
   
</head>

<body>
<h1> psql test </h1>
<?php
try {
    $user = 'cdsnhommsapxtd';
    $password = '$otpWug2';

    $db = new PDO('pgsql:host=ec2-54-235-109-37.compute-1.amazonaws.com;port=5432;dbname=de9dr91rnaase1', $user, $password);
    echo 'PLSQL connection successful';
} catch (PDOEXCEPTION $ex)
{
    echo 'Error!: ' . $ex->getMessage();
    die();
}

?>





  <br><br>
  
<input type="submit" value="Submit">
</form>
</html>
</body>
