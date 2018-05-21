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
    $password = 'b708eeb6d92062634b8a1e535954759f6ff4d1ddd06d83c7ed3a6acbbee31325';

    $db = new PDO('pgsql:host=ec2-54-235-109-37.compute-1.amazonaws.com;port=5432;dbname=de9dr91rnaase1', $user, $password);
    echo 'PLSQL connection successful';
} catch (PDOEXCEPTION $ex)
{
    echo 'Error!: ' . $ex->getMessage();
    die();
}

foreach ($db->query('SELECT username, password FROM note_user') as $row)
{
    echo 'user: ' . $row['username'] . 'password: ' . $row['password']. '<br/>';

}
?>





  <br><br>
  
<input type="submit" value="Submit">
</form>
</html>
</body>
