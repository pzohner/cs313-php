<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Team03</title>
   
</head>

<body>
<h1> psql test </h1>

<form action="insertdata.php" method="post">

Book:    <input type='text' name='book' value=''> <br>
Chapter: <input type='number' name='chapter' value=''> <br> 
Verse:   <input type='number' name='verse' value=''> <br> 
<span> Content </span>
<textarea rows="4" cols="50" name="content" ></textarea> 

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
        echo "<div><input type='checkbox' name='scriptopic[] value='" . $row['name'] . "'>" . $row['name'] . "</div>";
    }

?>
  
<input type="submit" value="submit" name="scriptureSubmit">

</form>
</html>
</body>
