<?php
session_start();
$_SESSION["character"] = $_POST['character'];
$character = $_POST['character'];
// $characterArray = [];
$dbUrl = getenv('DATABASE_URL');
            
    $dboptions = parse_url($dbUrl);

    $user = $dboptions['user'];
    $password = $dboptions['pass'];

        $db = new PDO('pgsql:host=ec2-54-235-109-37.compute-1.amazonaws.com;port=5432;dbname=de9dr91rnaase1', $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Database connection successful';



        


// Get the current character the user selected



// update the database to reflect which character is in use
$sql = "UPDATE character SET characterInUse = 'true' where avatarname = '$character'";

// Prepare statement
$stmt = $conn->prepare($sql);

// execute the query
$stmt->execute();


// $values = array();
// array_push($characterArray, $_POST['character']);

// $values[$_SESSION['currentUser']] = $_SESSION["character"];

// apc_add($values, null);

echo $_SESSION["character"];

?>