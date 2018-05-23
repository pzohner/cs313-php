<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Week 05 - Team </title>
   
</head>

<body>
<h1> Scripture Resources </h1>
<?php
try {
$dbUrl = getenv('DATABASE_URL');

$dboptions = parse_url($dbUrl);

$user = $dboptions['user'];
$password = $dboptions['pass'];

    $db = new PDO('pgsql:host=ec2-54-235-109-37.compute-1.amazonaws.com;port=5432;dbname=de9dr91rnaase1', $user, $password);
    // echo 'PLSQL connection successful';
} catch (PDOEXCEPTION $ex)
{
    echo 'Error!: ' . $ex->getMessage();
    die();
}

foreach ($db->query('SELECT book, chapter, verse, content FROM Scriptures') as $row)
{
    echo '<b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b>' . ' - ' . '"' . $row['content'] . '"' . '<br><br>';
}
?>

</html>
</body>
