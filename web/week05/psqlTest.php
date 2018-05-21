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
    $user = 'root';
    $password = '$otpWug2';

    $db = new PDO('pgsql:host=127.0.0.1;dbname=myTestDB', $user, $password);
    echo 'PLSQL connection successful';
} catch (PDFEXCEPTION $ex)
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
