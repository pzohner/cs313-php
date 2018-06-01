<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Team03</title>
   
</head>

<body>
<h1> psql test </h1>


<?php
    
echo 'Attempting to connect to database';
    try {
    $dbUrl = getenv('DATABASE_URL');

    $dboptions = parse_url($dbUrl);

    $user = $dboptions['user'];
    $password = $dboptions['pass'];

        $db = new PDO('pgsql:host=ec2-54-235-109-37.compute-1.amazonaws.com;port=5432;dbname=de9dr91rnaase1', $user, $password);
    
    echo 'About to execute first statement';
        
    $statement = $db->prepare('Select id, book, chapter, verse, content from scriptures');
    $statement->execute();

    echo 'got data from scriptures';
    
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo '<p>';
        echo $row['book'] . ' ' . $row['chapter'] . '  '.$row['verse'] . ' ' . $row['content'];


        $topicStatement = $db->prepare('SELECT name from topic t INNER JOIN topiscripturelink tsl on st.topicid = t.id WHERE tsl.scriptureid = :scriptureid');
        $topicStatement->bindValue(':scriptureid', $row['id']);
        $topicStatement->execute();

        while ($topicRow = $topicStatement->FETCH(PDO::FETCH_ASSOC)) {
            echo $topicRow['name'] . ' ';
        }

        echo '</p>';
        
    }
} catch (PDOEXCEPTION $ex)
{
    echo 'Error!: ' . $ex->getMessage();
    die();
}

?>
  

</html>
</body>
