<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Team03</title>
   
</head>

<body>
<h1> psql test </h1>
<form>
Book:    <input type='text' name='scriptureselections' value=''> <br>
Chapter: <input type='text' name='scriptureselections' value=''> <br> 
Verse:   <input type='text' name='scriptureselections' value=''> <br> 
<span> Content </span>
<textarea rows="4" cols="50"></textarea> 
</form>



<?php
try {
$dbUrl = getenv('DATABASE_URL');

$dboptions = parse_url($dbUrl);

$user = $dboptions['user'];
$password = $dboptions['pass'];

    $db = new PDO('pgsql:host=ec2-54-235-109-37.compute-1.amazonaws.com;port=5432;dbname=de9dr91rnaase1', $user, $password);
} catch (PDOEXCEPTION $ex)
{
    echo 'Error!: ' . $ex->getMessage();
    die();
}

foreach ($db->query('SELECT name FROM topic') as $row)
{
    echo "<div><input type='checkbox' name='scriptopic'>" . $row['name'] . "</div>";
}
?>





  <br><br>
  
<input type="submit" value="Submit">
</form>
</html>
</body>
