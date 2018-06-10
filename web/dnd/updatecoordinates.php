<?php
session_start();

$x = $_POST['x'];
$y = $_POST['y'];

$character = $_SESSION["character"];

$dbUrl = getenv('DATABASE_URL');
            
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

    $sql = 'UPDATE character '
                . 'SET posx = :x, '
                . 'posy = :y '
                . 'WHERE avatarname = :avatarname';
 
        $stmt = $db->prepare($sql);
 
        // bind values to the statement
        $stmt->bindValue(':x', $x);
        $stmt->bindValue(':y', $y);
        $stmt->bindValue(':avatarname', $character);
        // update data in the database
        $stmt->execute();


?>