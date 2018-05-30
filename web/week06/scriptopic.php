<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Team03</title>
   
</head>

<body>
<h1> psql test </h1>

<form action="scriptopic.php" method="Post">

Book:    <input type='text' name='book' value=''> <br>
Chapter: <input type='text' name='chapter' value=''> <br> 
Verse:   <input type='text' name='verse' value=''> <br> 
<span> Content </span>
<textarea rows="4" cols="50"></textarea> 

<?php
    if (isset($_POST['scriptureSubmit'])) {
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
            
            $db->query("INSERT INTO scriptures (book, chapter, verse, content) VALUES ('".$_POST["book"]."','".$_POST["chapter"]."','".$_POST["verse"]."','".$_POST["content"]."')");
            // (\'$_POST['book']\', $_POST['chapter'], $_POST['verse'], \'$_POST['content']\')")
    }

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
  
<input type="submit" value="submit" name="scriptureSubmit">

</form>
</html>
</body>
